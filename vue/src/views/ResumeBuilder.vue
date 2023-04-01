<template>
  <pageComponent>
    <div class="edit-main">
      <div class="edit-container">
        <div class="edit-inner">
          <div class="edit-form">
            <form @submit.prevent="saveResume" class="edit-form_container">
              <div class="resume_title">
                <div class="title_inner">
                  <input
                    type="text"
                    name="title"
                    id="title"
                    v-model="model.title"
                    className="name-textfield"
                  />
                </div>
              </div>
              <div class="progress">
                <ProgressBar />
              </div>
              <div class="edit-form_block">
                <div class="sect-form">
                  <div class="sect-form_inner">
                    <div class="is-form">
                      <!-- contact -->
                      <div class="form-step">
                        <h2 class="is-form_header">
                          How can employers contact you
                        </h2>

                        <div class="is-block">
                          <div class="form-item">
                            <label for="FirstName" className="name-field"
                              >First name</label
                            >
                            <input
                              type="text"
                              name="Firstname"
                              id="FirstName"
                              v-model="model.first_name"
                              autocomplete="firstname"
                              placeholder="First Name"
                              className="name-textfield"
                            />
                          </div>
                          <div class="form-item">
                            <label for="LastName" className="name-field"
                              >Last Name</label
                            >
                            <input
                              type="text"
                              name="lastname"
                              id="LastName"
                              v-model="model.last_name"
                              autocomplete="lastname"
                              placeholder="Last Name"
                              className="name-textfield"
                            />
                          </div>
                          <div class="form-item">
                            <label for="Email" className="name-field"
                              >Email</label
                            >
                            <input
                              type="text"
                              name="Email"
                              id="Email"
                              v-model="model.email"
                              autocomplete="email"
                              placeholder="myemail@resume.com"
                              className="name-textfield"
                            />
                          </div>
                          <div class="form-item">
                            <label for="phone" className="name-field"
                              >Phone Number</label
                            >
                            <input
                              type="text"
                              name="phone"
                              id="Phone"
                              v-model="model.phone"
                              autocomplete="phone_number"
                              placeholder="(+254)123-4567"
                              className="name-textfield"
                            />
                          </div>
                        </div>
                        <div class="is-block">
                          <div class="form-item">
                            <label for="country" className="name-field"
                              >Country</label
                            >
                            <input
                              type="text"
                              name="country"
                              id="Country"
                              v-model="model.country"
                              autocomplete="country"
                              placeholder="country"
                              className="name-textfield"
                            />
                          </div>
                          <div class="form-item">
                            <label for="city" className="name-field"
                              >city</label
                            >
                            <input
                              type="text"
                              name="city"
                              id="City"
                              v-model="model.city"
                              autocomplete="city"
                              placeholder="City"
                              className="name-textfield"
                            />
                          </div>
                        </div>
                      </div>
                      <!-- Professional Summary -->
                      <div class="form-step">
                        <h2 class="is-form_header">Professional Summary</h2>
                        <p class="is-form_p">
                          Write 2-4 short & energetic sentences to interest the
                          reader! Mention your role, experience & most
                          importantly - your biggest achievements, best
                          qualities and skills
                        </p>
                        <pre>{{ model.professional_summary }}</pre>

                        <div class="texteditor-wrapper">
                          <RichTextEditor
                            v-model="model.professional_summary"
                            :ToggleSummaryModal="() => ToggleSummaryModal()"
                          />
                        </div>
                      </div>

                      <!-- Employment History -->
                      <div class="experience-header">
                        <h2 class="is-form_header">Employment History</h2>
                        <p class="is-form_p">
                          Show your relevant experience(last 10 years).
                        </p>
                      </div>

                      <div
                        v-for="(
                          experience_data, index
                        ) in model.experiences_data"
                        :key="experience_data.id"
                      >
                        <Experienceeditor
                          :experience_data="experience_data"
                          :index="index"
                          @change="experienceChange"
                          @addExperience="addExperience"
                          @deleteExperience="deleteExperience"
                        />
                      </div>
                      <div @click="addExperience()" class="add_section">
                        <div class="add_section-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"
                            />
                          </svg>
                        </div>
                        <span class="add_section-text"
                          >Add more employment</span
                        >
                      </div>

                      <!-- Education -->
                      <div class="experience-header">
                        <h2 class="is-form_header">Education History</h2>
                        <p class="is-form_p">Show your relevant education.</p>
                      </div>

                      <div
                        v-for="(education, index) in model.education_data"
                        :key="education.id"
                      >
                        <Educationeditor
                          :education="education"
                          :index="index"
                          @change="educationChange"
                          @addEducation="addEducation"
                          @deleteEducation="deleteEducation"
                        />
                      </div>
                      <div @click="addEducation()" class="add_section">
                        <div class="add_section-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"
                            />
                          </svg>
                        </div>
                        <span class="add_section-text">Add more education</span>
                      </div>

                      <!-- Skills -->
                      <div class="form-step">
                        <h2 class="is-form_header">Skills</h2>
                        <p class="is-form_p">
                          Choose 5 of the most important skills to show your
                          talents. Make sure they match the keywords of the job
                          listing if applying via an online system.
                        </p>
                        <div class="skills-textarea">
                          <textarea
                            name="skills"
                            id="skills"
                            v-model="model.skills"
                            cols="30"
                            rows="10"
                          >
                          </textarea>
                          <TagInput v-model="model.skills" />
                        </div>
                      </div>

                      <!-- Language Optional -->
                      <div class="form-step">
                        <h2 class="is-form_header">Language(Optional)</h2>
                      </div>
                      <!-- links -->
                      <div class="form-step">
                        <h2 class="is-form_header">Add links</h2>

                        <div
                          v-for="(link, index) in model.links"
                          :key="link.id"
                        >
                          <Linkseditor
                            :link="link"
                            :index="index"
                            @change="linkChange"
                            @addLink="addLink"
                            @deleteLink="deleteLink"
                          />
                        </div>
                        <div @click="addLink()" class="add_section">
                          <div class="add_section-icon">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-4 w-4"
                              viewBox="0 0 20 20"
                              fill="currentColor"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"
                              />
                            </svg>
                          </div>
                          <span class="add_section-text">Add more Links</span>
                        </div>
                      </div>

                      <!-- Add Section -->

                      <div class="form-step">
                        <h2 class="is-form_header">Add section</h2>
                        <div
                          v-for="(section, index) in model.add_section"
                          :key="section.id"
                        >
                          <Addsectioneditor
                            :section="section"
                            :index="index"
                            @change="addsectionChange"
                            @addSection="addSection"
                            @deleteSection="deleteSection"
                          />
                        </div>
                        <div @click="addSection()" class="add_section">
                          <div class="add_section-icon">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-4 w-4"
                              viewBox="0 0 20 20"
                              fill="currentColor"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"
                              />
                            </svg>
                          </div>
                          <span class="add_section-text">Add more section</span>
                        </div>
                      </div>
                      <div class="is-form_buttons">
                        <button type="submit" class="is_button button-prev">
                          Save
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="resume-edit_preview">
            <div class="resume-preview_container">
              <div class="resume-preview_background">
                <div class="preview">
                  <!-- resume goes here -->

                  <div
                    v-if="model.template == 'apollo'"
                    class="mainres bg_white"
                  >
                    <Cv1 :model="model" />
                  </div>
                  <div
                    v-else-if="model.template == 'terra'"
                    class="mainres bg_white"
                  >
                    <Cv2 :model="model" />
                  </div>
                  <div class="preview-sect_btn">
                    <button
                      @click="() => ToggleModal()"
                      class="btn-change_template"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"
                        />
                      </svg>
                      Change Template
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <ProfessionalSummarySamples
      v-if="showSummaryModal.summaryTrigger"
      :ToggleSummaryModal="() => ToggleSummaryModal()"
    />
    <ResumeTemplates
      v-if="showMTempTrigger.templatesTrigger"
      :ToggleModal="() => ToggleModal()"
      :model="model"
      @change="templateChange"
    />
  </pageComponent>
</template>

<script setup>
import pageComponent from "../components/PageComponent.vue";
import RichTextEditor from "../components/TextEditor/RichTextEditor.vue";
import ProgressBar from "../components/ProgressBar.vue";
import ResumeTemplates from "../components/Popups/ResumeTemplates.vue";
import Experienceeditor from "../components/editor/Experienceeditor.vue";
import Educationeditor from "../components/editor/Educationeditor.vue";
import Linkseditor from "../components/editor/Linkseditor.vue";
import Addsectioneditor from "../components/editor/Addsectioneditor.vue";
import ProfessionalSummarySamples from "../components/Popups/ProfessionalSummarySamples.vue";
import TagInput from "../components/TagInput.vue";
import Cv1 from "../components/CvTemplates/Cv1.vue";
import Cv2 from "../components/CvTemplates/Cv2.vue";
import { v4 as uuidv4 } from "uuid";
import { ref, watch, computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import store from "../store";

const route = useRoute();

const router = useRouter();

//survey fields
let model = ref({
  title: "untitled",
  slug: "",
  template: "apollo",
  first_name: "",
  last_name: "",
  address: "",
  city: "",
  state: "",
  country: "",
  Zipcode: "",
  email: "",
  phone: "",
  skills: "",
  language: "",
  professional_summary: "",
  experiences_data: [],
  education_data: [],
  links: [],
  add_section: [],
});

//watch currentSurvey for any data changes then update the local model
watch(
  () => store.state.currentResume.data,
  (newVal, oldVal) => {
    model.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
);

//if id exist
if (route.params.id) {
  store.dispatch("getResume", route.params.id);
}

/*------ Experience ------*/

//Add experience
function addExperience(index) {
  const newExperience = {
    id: uuidv4(),
    job_title: "",
    employer: "",
    job_city: " ",
    job_state: "",
    job_country: "",
    startjob_date: "",
    endjob_date: "",
    description: "",
  };

  model.value.experiences_data.splice(index, 0, newExperience);
}

//delete experience
function deleteExperience(experience) {
  model.value.experiences_data = model.value.experiences_data.filter(
    (r) => r !== experience
  );
}

//data change
function experienceChange(experience) {
  model.value.experiences_data = model.value.experiences_data.map((ex) => {
    if (ex.id === experience.id) {
      return JSON.parse(JSON.stringify(experience));
    }
    return ex;
  });
}

/*------ Education ------*/

//add
function addEducation(index) {
  const newEducation = {
    id: uuidv4(),
    school_name: "",
    school_city: "",
    school_state: "",
    country: "",
    certification: "",
    startschool_date: "",
    endschool_date: "",
    school_description: "",
  };

  model.value.education_data.splice(index, 0, newEducation);
}

//delete experience
function deleteEducation(education) {
  model.value.education_data = model.value.education_data.filter(
    (ed) => ed !== education
  );
}

//data change
function educationChange(education) {
  model.value.education_data = model.value.education_data.map((ed) => {
    if (ed.id === education.id) {
      return JSON.parse(JSON.stringify(education));
    }
    return ed;
  });
}

/*------ links ------*/

//add
function addLink(index) {
  const newLink = {
    id: uuidv4(),
    label: "",
    url: "",
  };

  model.value.links.splice(index, 0, newLink);
}

//delete link
function deleteLink(link) {
  model.value.links = model.value.links.filter((l) => l !== link);
}

//data change
function linkChange(link) {
  model.value.links = model.value.links.map((l) => {
    if (l.id === link.id) {
      return JSON.parse(JSON.stringify(link));
    }
    return l;
  });
}

/*------ addsection ------*/

//add
function addSection(index) {
  const newSection = {
    id: uuidv4(),
    title: "",
    description: "",
  };

  model.value.add_section.splice(index, 0, newSection);
}

//delete section
function deleteSection(section) {
  model.value.add_section = model.value.add_section.filter(
    (s) => s !== section
  );
}

//data change
function addsectionChange(section) {
  model.value.add_section = model.value.add_section.map((s) => {
    if (s.id === section.id) {
      return JSON.parse(JSON.stringify(section));
    }
    return s;
  });
}

//create or delete resume
function saveResume() {
  store.dispatch("saveResume", model.value).then(({ data }) => {
    router.push({
      name: "ResumePreview",
      params: { id: data.data.id },
    });
  });
}

function templateChange(data) {
  model.value.template = data;
}

//modal stuff
let showMTempTrigger = ref({
  templatesTrigger: false,
});
//toggele templates modal
const ToggleModal = () => {
  showMTempTrigger.value.templatesTrigger =
    !showMTempTrigger.value.templatesTrigger;
};

// professionalsummary modal
let showSummaryModal = ref({
  summaryTrigger: false,
});
//toggele templates modal
const ToggleSummaryModal = () => {
  showSummaryModal.value.summaryTrigger =
    !showSummaryModal.value.summaryTrigger;
};
</script>

<style lang="scss">
.edit-main {
  position: relative;
  width: 100%;
  height: 100vh;
  .edit-container {
    //padding: 0.5em;
    height: 100%;
    .edit-inner {
      width: 100%;
      display: flex;
      height: 100%;
      .edit-form {
        width: 50%;
        display: flex;
        //background: red;
        justify-content: space-between;
        padding-right: 1.2em;
        margin-top: 58px;
        margin-bottom: 20px;
        .edit-form_container {
          width: 100%;
          padding: 1.1em;
          .resume_title {
            font-size: 27px;
            line-height: 28px;
            font-weight: 500;
            text-align: center;
            position: relative;
            margin-bottom: 2px;
            padding: 0px 32px;
            .title_inner {
              display: inline-block;
              position: relative;
              max-width: 100%;
              vertical-align: top;
              height: 34px;
              overflow: hidden;
              input {
                position: relative;
                background-color: transparent;
                width: 100%;
                height: 100%;
                left: 0px;
                top: 0px;
                padding: 0px;
                margin: 0px;
                border: none;
                font: inherit;
                text-align: center;
                caret-color: rgb(6 36 165);
                outline: none;
              }
            }
          }
          .progress {
            display: block;
            user-select: none;
            margin-bottom: 12px;
            position: sticky;
            top: 0px;
            background-color: #fbfbfb;
            z-index: 2;
            padding-top: 20px;
            padding-bottom: 16px;
          }
          .edit-form_block {
            display: block;
            height: 100%;

            .sect-form {
              //background: rgb(0, 83, 35);
              height: 100%;
              width: 615px;
              position: relative;
              .sect-form_inner {
                padding: 1.1em;
                .is-form {
                  .form-step {
                    display: block;
                    margin-bottom: 3em;
                  }
                  .experience-header {
                    display: block;
                  }
                  .is-dropdown {
                    display: block;
                    padding: 1em;

                    overflow: hidden;
                    border: 1px solid rgb(231, 234, 244);
                    border-radius: 4px;
                    background-color: #fbfbfb;
                    user-select: none;
                    .is-dropdown_header_sect {
                      display: flex;
                      justify-content: space-between;
                      padding-bottom: 1.2em;
                      .is-dropdown_header-inner {
                        display: block;
                        .is-dropdown-header {
                          color: black;
                          font-weight: 400;
                        }
                      }
                      .is-dropdown_opt {
                        display: flex;
                        -webkit-box-align: center;
                        align-items: center;
                        font-size: 16px;
                        line-height: 20px;
                        color: rgb(130, 139, 162);
                        cursor: pointer;
                        user-select: none;
                        pointer-events: auto;
                        .option {
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          border-radius: 9999px;
                          border-width: 1px;
                          border-color: transparent;
                          // margin-left: 8px;
                          // color: rgb(255, 255, 255);
                          // background-color: #44328e;
                          // border-radius: 50%;
                          svg {
                            width: 1.5rem;
                            height: 1.5rem;
                            display: block;
                            stroke: rgb(6 36 165);
                          }
                        }
                      }
                    }
                  }
                  .is-form_header {
                    color: #1e2532;
                    font-weight: 600;
                    font-size: 23px;
                    line-height: 28px;
                    margin-bottom: 24px;
                  }
                  .is-form_p {
                    font-weight: 400;
                    font-size: 0.8em;
                    width: 561px;
                  }
                  .is-form_block {
                    display: flex;
                    flex-wrap: wrap;
                    //margin-top: 24px;
                    // .form-item {
                    //   padding-right: 4em;
                    //   padding-bottom: 24px;
                    //   .is-dates {
                    //     margin: 0;
                    //   }
                    //   .name-field {
                    //     width: 100%;
                    //     margin-bottom: 6px;
                    //     // color: black;
                    //     color: rgb(137 137 137);
                    //     letter-spacing: 0.1px;
                    //     font-size: 16px;
                    //     line-height: 20px;
                    //     text-transform: uppercase;
                    //     display: block;
                    //   }
                    //   .name-textfield {
                    //     border: none;
                    //     height: 38px;
                    //     width: 220px;
                    //     //border: 1px solid black;
                    //     border-radius: 5px;
                    //     background-color: rgb(239, 242, 249);
                    //     padding-left: 13px;
                    //   }
                    // }
                  }
                  .add_section {
                    font-size: 16px;
                    line-height: 20px;
                    display: flex;
                    -webkit-box-align: center;
                    align-items: center;
                    -webkit-box-pack: start;
                    justify-content: flex-start;
                    position: relative;
                    padding: 6px 14px;
                    width: 100%;
                    border-radius: 4px;
                    background-color: rgba(234, 246, 255, 0);
                    color: #6d5cab;
                    font-weight: 600;
                    cursor: pointer;
                    outline: none;
                    transition: background-color 0.15s ease 0s;
                    .add_section-icon {
                      margin-right: 2px;
                      svg {
                        width: 24px;
                        height: 24px;
                        fill: currrentColor;
                      }
                    }
                    .add_section-text {
                      padding: 0;
                    }
                  }
                  .is-form_buttons {
                    display: flex;
                    align-items: center;
                    //justify-content: center;
                    .is_button {
                      margin: 0.7em;
                      margin-left: 10px;
                      padding: 0.8em 2.7em;
                      border: none;
                      border-radius: 9px;
                      background-color: rgb(8, 8, 70);
                      color: white;
                    }
                  }
                }
              }
            }
          }
        }
      }
      .resume-edit_preview {
        width: 50%;

        position: relative;
        //background: blue;
        .resume-preview_container {
          width: 100%;
          height: 100%;
          position: relative;
          .resume-preview_background {
            position: fixed;
            //width: 100%;
            height: 100%;
            //left: 2.1em;
            border-radius: 5px;
            background-color: #d6ebf1;

            .preview {
              padding-top: 58px;
              padding-left: 65px;
              /* resume template */
              .mainres {
                position: relative;
                background: white;
                border-radius: 0.25rem;
                box-shadow: 0 0 0.125rem 0 rgb(0 0 0 / 10%);
                min-height: 59.375rem;
                padding: 3rem 3.2rem;
                width: 51rem;
                transform: scale(0.57);
                transform-origin: top left;
                .inner {
                  color: black;
                  font-family: Forno, "Source Sans Pro", sans-serif;
                  background-color: white;
                  font-size: 12px;
                  .profile_sect {
                    width: 100%;
                    margin-bottom: 2em;
                  }
                  .profile_inner {
                    display: flex;
                    flex-direction: column;
                    border-left: 1.25rem solid black;
                    padding-left: 1.5rem;
                  }
                  .name_main {
                    font-size: 2.5em;
                    font-weight: 600;
                    line-height: 1.1;
                    word-break: break-word;
                  }
                  .sarif {
                    font-family: MerriWeather, sarif;
                    line-height: 1.45em;
                    font-size: 0.9rem;
                  }
                  .text-left {
                    text-align: left;
                  }
                  .sect {
                    margin-bottom: 16px;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
                  }
                  .sect-marg-top {
                    margin-top: 0px;
                    outline-offset: 3px;
                  }
                  .sect_container {
                    display: flex;
                    flex-direction: column;
                  }
                  .summary_title {
                    width: 100%;
                    margin-bottom: 0.1rem;
                    -webkit-box-orient: vertical;
                    display: -webkit-box !important;
                  }
                  .section_title {
                    position: relative;
                    font-weight: bold;
                    font-size: 14.4px;
                    span {
                      color: rgb(15, 15, 15);
                      outline: unset;
                    }
                  }
                  .section_content {
                    width: 100%;
                    margin-bottom: 0.75rem;
                  }
                  .margin-bot-1 {
                    margin-bottom: 0.4em;
                  }
                  .exper_container {
                    width: 100%;
                    position: relative;
                  }
                  .exp_title {
                    width: 100%;
                    margin-bottom: 0.75rem;
                  }
                }
              }
              .btn-change_template {
                border: none;
                font-size: 0.875rem /* 14px */;
                line-height: 1.25rem;
                color: blue;
                outline: none;
                top: 38rem;
                position: absolute;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                .w-6 {
                  width: 35px;
                }
                .h-6 {
                  height: 35px;
                }
              }
            }
          }
        }
      }
    }
  }
}
.is-dropdown_content {
  display: block;
}
.is-closed {
  height: 0px;
}

.is-block {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-auto-rows: auto;
  padding-top: 18px;
  .form-item {
    padding-right: 1.2em;
    padding-bottom: 24px;
    .is-dates {
      margin: 0;
    }
    .name-field {
      width: 100%;
      margin-bottom: 6px;
      // color: black;
      color: rgb(137 137 137);
      letter-spacing: 0.1px;
      font-size: 16px;
      line-height: 20px;
      text-transform: uppercase;
      display: block;
    }
    .name-textfield {
      border: none;
      height: 48px;
      width: 100%;
      //border: 1px solid black;
      border-radius: 5px;
      background-color: rgb(239, 242, 249);
      padding-left: 13px;
    }
  }
}
.is-dates-wrapper {
  display: flex;
  flex-direction: column;
  width: 220px;
  height: 38px;
  justify-content: space-between;
}
.is-date_short {
  width: 100px !important;
}
.flexxed {
  display: flex;
  width: 107px;
  flex-direction: column;
}

.is-flex_row {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.texteditor-wrapper {
  // display: block;
  // border: 1px solid #cdcdcd;
  // border-radius: 3px;
  // height: 200px;
  // overflow: hidden;
  // padding: 1em;
  position: relative;
  border-radius: 3px;
  resize: none;
  display: block;
  caret-color: rgb(26, 145, 240);
  background-color: rgb(239, 242, 249);
  outline: none;
  border: 0px;
}
</style>
