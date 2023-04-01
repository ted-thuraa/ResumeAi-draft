<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResumeRequest;
use App\Http\Requests\UpdateResumeRequest;
use App\Http\Resources\ResumeResource;
use App\Models\ResumeAddsection;
use App\Models\ResumeEducation;
use App\Models\ResumeExperience;
use App\Models\Resumelink;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return ResumeResource::collection(Resume::where('user_id', $user->id)->paginate(6));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResumeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResumeRequest $request)
    {
        $data = $request->validated();
        $resume = Resume::create($data);

        //store experiences
        foreach($data['experiences_data'] as $experience) {
            //link to the resume
            $experience['resume_id'] = $resume->id;

            //create in database
            $this->createExperience($experience);
        }

        //store education stuff
        foreach($data['education_data'] as $education) {
            //link to the resume
            $education['resume_id'] = $resume->id;

            //create in database
            $this->createEducation($education);
        }

        //store links
        foreach($data['links'] as $link) {
            //link to the resume
            $link['resume_id'] = $resume->id;

            //create in database
            $this->createLink($link);
        }

        //store additional sections
        foreach($data['add_section'] as $section) {
            //link to the resume
            $section['resume_id'] = $resume->id;

            //create in database
            $this->createSection($section);
        }

        return new ResumeResource($resume);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume, Request $request)
    {
        $user =$request->user();
        if ($user->id !== $resume->user_id) {
            return abort(403, 'Unauthorized action');
        }
        return new ResumeResource($resume);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResumeRequest  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResumeRequest $request, Resume $resume)
    {
        $data =$request->validated();
        $resume->update($data);

        // get ids as plain array of existing experiences
        $existingexpIds =$resume->experiences()->pluck('id')->toArray();

        // Find questions ids of passed/new questions as plain array
        $newexpIds = ARR::pluck($data['experiences_data'], 'id');

        // Find questions to delete
        // array_diff returns contents of array1 that are not in array2

        $toDeleteexp = array_diff($existingexpIds, $newexpIds);

        // Find questions to add
        $toAddexp = array_diff($newexpIds, $existingexpIds);

        // Delete questions by $toDelete array
        ResumeExperience::destroy($toDeleteexp);

        // Create new questions

        foreach ($data['experiences_data'] as $experience) {
            if (in_array($experience['id'], $toAddexp)) {
                $experience['resume_id'] = $resume->id;
                $this->createExperience($experience);
            }
        }

        // Update existing questions

        $experienceMap = collect($data['experiences_data'])->keyBy('id');
        foreach ($resume->experiences as $exp) {
            if (isset($experienceMap[$exp->id])) {
                $this->updateExperience($exp, $experienceMap[$exp->id]);
            }
        }

        //education
        $existingEduIds =$resume->experiences()->pluck('id')->toArray();
        $neweduIds = ARR::pluck($data['education_data'], 'id');
        $toDeleteEdu = array_diff($existingEduIds, $neweduIds);
        $toAddEdu = array_diff($neweduIds, $existingEduIds);
        ResumeEducation::destroy($toDeleteEdu);
        foreach ($data['education_data'] as $education) {
            if (in_array($education['id'], $toAddEdu)) {
                $education['resume_id'] = $resume->id;
                $this->createEducation($education);
            }
        }
        $educationMap = collect($data['education_data'])->keyBy('id');
        foreach ($resume->educations as $edu) {
            if (isset($educationMap[$edu->id])) {
                $this->updateEducation($edu, $educationMap[$edu->id]);
            }
        }

        //links
        $existingLinkIds =$resume->experiences()->pluck('id')->toArray();
        $newLinkIds = ARR::pluck($data['links'], 'id');
        $toDeleteLinks = array_diff($existingLinkIds, $newLinkIds);
        $toAddLinks = array_diff($newLinkIds, $existingLinkIds);
        Resumelink::destroy($toDeleteLinks);
        foreach ($data['links'] as $link) {
            if (in_array($link['id'], $toAddLinks)) {
                $link['resume_id'] = $resume->id;
                $this->createLink($link);
            }
        }
        $linkMap = collect($data['links'])->keyBy('id');
        foreach ($resume->links as $link) {
            if (isset($linkMap[$link->id])) {
                $this->updateLink($link, $linkMap[$link->id]);
            }
        }

        //add section
        $existingSectIds =$resume->experiences()->pluck('id')->toArray();
        $newSectIds = ARR::pluck($data['add_section'], 'id');
        $toDeleteSect = array_diff($existingSectIds, $newSectIds);
        $toAddSect = array_diff($newSectIds, $existingSectIds);
        ResumeAddsection::destroy($toDeleteSect);
        foreach ($data['add_section'] as $link) {
            if (in_array($link['id'], $toAddSect)) {
                $link['resume_id'] = $resume->id;
                $this->createSection($link);
            }
        }
        $linkMap = collect($data['add_section'])->keyBy('id');
        foreach ($resume->links as $link) {
            if (isset($linkMap[$link->id])) {
                $this->updateSection($link, $linkMap[$link->id]);
            }
        }

        return new ResumeResource($resume);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume, Request $request)
    {
        $user = $request->user();
        if ($user->id !== $resume->user_id) {
            return abort(403, 'Unauthorized action.');
        }

        $resume->delete();
        return response('', 204);
    }

    //createExperiences
    private function createExperience($data)
    {
        $validator = Validator::make($data, [
            'job_title' => 'nullable|string',
            'employer' => 'nullable|string',
            'job_city' => 'nullable|string',
            'job_state' => 'nullable|string',
            'job_country' => 'nullable|string',
            'startjob_date' => 'nullable|date',
            'endjob_date' => 'nullable|date',
            'description' => 'nullable|string',
            'resume_id' => 'exists:App\Models\Resume,id'
        ]);

        return ResumeExperience::create($validator->validated());
    }

    //update
    public function updateExperience(ResumeExperience $exp, $data)
    {
        $validator = Validator::make($data, [
            'id' => 'exists:App\Models\ResumeExperience,id',
            'job_title' => 'nullable|string',
            'employer' => 'nullable|string',
            'job_city' => 'nullable|string',
            'job_state' => 'nullable|string',
            'job_country' => 'nullable|string',
            'startjob_date' => 'nullable|date',
            'endjob_date' => 'nullable|date',
            'description' => 'nullable|string',
            'resume_id' => 'exists:App\Models\Resume,id'
        ]);

        return $exp->update($validator->validated());

    }
    
    public function createEducation($data)
    {
        $validator = Validator::make($data, [
            'resume_id' => 'exists:App\Models\Resume,id',
            'school_name' => 'nullable|string',
            'school_city' => 'nullable|string',
            'school_state' => 'nullable|string',
            'school_country' => 'nullable|string',
            'certification' => 'nullable|string',
            'startschool_date' => 'nullable|date',
            'endschool_date' => 'nullable|date',
            'school_description' => 'nullable|string',
        ]);

        return ResumeEducation::create($validator->validated());
        
    }

    public function updateEducation(ResumeEducation $edu, $data)
    {
        $validator = Validator::make($data, [
            'id' => 'exists:App\Models\ResumeEducation,id',
            'school_name' => 'nullable|string',
            'school_city' => 'nullable|string',
            'school_state' => 'nullable|string',
            'school_country' => 'nullable|string',
            'certification' => 'nullable|string',
            'startschool_date' => 'nullable|date',
            'endschool_date' => 'nullable|date',
            'school_description' => 'nullable|string',
        ]);

        return $edu->update($validator->validated());
    }

    public function createLink($data)
    {
        $validator = Validator::make($data, [
            'resume_id' => 'exists:App\Models\Resume,id',
            'label' => 'required|string',
            'url' => 'nullable|string',
        ]);

        return Resumelink::create($validator->validated());
        
    }

    public function updateLink(Resumelink $link, $data)
    {
        $validator = Validator::make($data, [
            'id' => 'exists:App\Models\Resumelink,id',
            'label' => 'required|string',
            'url' => 'nullable|string',
        ]);

        return $link->update($validator->validated());
    }

    public function createSection($data)
    {
        $validator = Validator::make($data, [
            'resume_id' => 'exists:App\Models\Resume,id',
            'title'=> "nullable|string",
            'description'=> "nullable|string",
        ]);

        return ResumeAddsection::create($validator->validated());
        
    }

    public function updateSection(ResumeAddsection $section, $data)
    {
        $validator = Validator::make($data, [
            'id' => 'exists:App\Models\ResumeAddsection,id',
            'title'=> "nullable|string",
            'description'=> "nullable|string",
        ]);

        return $section->update($validator->validated());
    }

}
