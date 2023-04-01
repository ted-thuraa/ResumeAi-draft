<template>
  <div class="form-step">
    <div class="is-dropdown">
      <div class="is-dropdown_header_sect">
        <div class="is-dropdown_header-inner">
          <h3 class="is-dropdown-header">
            {{ model.job_title }}
          </h3>
          <span>{{ model.startjob_date }} - {{ model.endjob_date }}</span>
        </div>
        <div class="is-dropdown_opt">
          <div class="option" @click="() => ToggleAccordion()">
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
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
              />
            </svg>
          </div>
          <div class="option" @click="deleteExperience()">
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
                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
              />
            </svg>
          </div>
        </div>
      </div>
      <div
        class="is-dropdown_content"
        :class="[dropAccordion.accordionTrigger ? 'is-closed' : '']"
      >
        <div class="is-block">
          <div class="form-item">
            <label for="Jobtitle" className="name-field">Job title</label>
            <input
              type="text"
              name="jobtitle"
              id="jobtitle"
              v-model="model.job_title"
              @change="dataChange"
              autocomplete="jobtitle"
              placeholder="Job title"
              className="name-textfield"
            />
          </div>
          <div class="form-item">
            <label for="Employer" className="name-field">Employer</label>
            <input
              type="text"
              name="employer"
              id="Employer"
              v-model="model.employer"
              @change="dataChange"
              autocomplete="employer"
              placeholder="Your employer"
              className="name-textfield"
            />
          </div>
          <div class="form-item">
            <label for="City" className="name-field">City</label>
            <input
              type="text"
              name="city"
              id="City"
              v-model="model.job_city"
              @change="dataChange"
              autocomplete="jobcity"
              placeholder="City"
              className="name-textfield"
            />
          </div>
          <div class="form-item is-flex_row">
            <div class="flexxed">
              <label for="Startdate" className="name-field">Start Date</label>
              <input
                type="date"
                name="startdate"
                id="Startdate"
                v-model="model.startjob_date"
                @change="dataChange"
                autocomplete="startjobdate"
                placeholder="MM / YYYY"
                className="name-textfield is-date_short"
              />
            </div>
            <div class="flexxed">
              <label for="Enddate" className="name-field">End date</label>
              <input
                type="date"
                name="enddate"
                id="Enddate"
                v-model="model.endjob_date"
                @change="dataChange"
                autocomplete="endjobdate"
                placeholder="MM / YYYY"
                className="name-textfield is-date_short"
              />
            </div>
          </div>
        </div>
        <label for="Description" className="name-field">Description</label>
        <div class="texteditor-wrapper">
          <RichTextEditor v-model="model.description" @change="dataChange" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { v4 as uuidv4 } from "uuid";
import RichTextEditor from "../TextEditor/RichTextEditor.vue";
import store from "../../store";

const props = defineProps({
  experience_data: Object,
  index: Number,
});

// tells the parent component that this component emits the following
const emit = defineEmits(["change", "addExperience", "deleteExperience"]);

//re-create the whole experience data to avoid unintentional reference change
const model = ref(JSON.parse(JSON.stringify(props.experience_data)));

//Emit the data change
function dataChange() {
  const data = JSON.parse(JSON.stringify(model.value));

  emit("change", data);
}

function addExperience() {
  emit("addExperience", props.index + 1);
}

function deleteExperience() {
  emit("deleteExperience", props.experience_data);
}

//toggle
let dropAccordion = ref({
  accordionTrigger: false,
});
const ToggleAccordion = () => {
  dropAccordion.value.accordionTrigger = !dropAccordion.value.accordionTrigger;
};
</script>

<style></style>
