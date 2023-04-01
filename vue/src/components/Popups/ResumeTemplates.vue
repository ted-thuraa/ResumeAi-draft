<template>
  <div class="templates-modal">
    <div class="templates-modal-inner">
      <div class="btn-modal_cancel">
        <button @click="ToggleModal()" class="btn-cancel-modal">
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
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>
      <div class="preview-modal-container">
        <h1 class="modal-title">Choose a Template</h1>
        <div class="templates-preview-container">
          <div class="sect-templates-recomended">
            <div class="temp-type">Recomended</div>
            <div class="temp-description">
              Each template is designed for online job applications and getting
              through the ATS software that scans your resume. These templates
              follow the rules hiring managers are looking for.
            </div>
            <div class="row-temps">
              <div class="card-contaners">
                <div class="flex-card">
                  <a
                    @click="changeTemplate((temp = 'apollo'))"
                    class="resume-card_link"
                  >
                    <div class="mainres bg_white">
                      <img src="../../assets/images/templates/terra.png" />
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-contaners">
                <div class="flex-card">
                  <a
                    @click="changeTemplate((temp = 'terra'))"
                    class="resume-card_link"
                  >
                    <div class="mainres bg_white">
                      <img src="../../assets/images/templates/apollo.png" />
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="sect-templates-recomended">
            <div class="temp-type">Professional</div>
            <div class="temp-description">
              Well designed to look professional, highlight your background, and
              land your dream job. Perfectly parsable by hiring systems. Suits
              any situations on your jobseeking road.
            </div>
            <div class="row-temps">
              <div class="card-contaners">
                <div class="flex-card">
                  <a href="#" class="resume-card_link">
                    <div class="mainres bg_white">
                      <img src="../../assets/images/templates/terra.png" />
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-contaners">
                <div class="flex-card">
                  <a href="#" class="resume-card_link">
                    <div class="mainres bg_white">
                      <Cv2 />
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-contaners">
                <div class="flex-card">
                  <a href="#" class="resume-card_link">
                    <div class="mainres bg_white">
                      <Cv2 />
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Cv1 from "../CvTemplates/Cv1.vue";
import Cv2 from "../CvTemplates/Cv2.vue";
import { ref, computed } from "vue";

const props = defineProps({
  model: Object,
  ToggleModal: Function,
});

const emit = defineEmits(["change", "ToggleModal"]);

const model = ref(JSON.parse(JSON.stringify(props.model)));

let temp = "";

function changeTemplate(temp) {
  props.ToggleModal();
  emit("change", temp);
}
</script>

<style lang="scss" scoped>
.templates-modal {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 99;
  background-color: rgba(0, 0, 0, 0.43);
  display: flex;
  align-items: center;
  justify-content: center;
  .templates-modal-inner {
    background-color: #fff;
    border-radius: 0.125rem;
    margin: 0 auto;
    max-width: 68.75rem;
    position: relative;
    width: 90%;
    .btn-modal_cancel {
      border-radius: 3.125rem;
      height: 2.75rem;
      padding: 0;
      position: absolute;
      right: 0.625rem;
      top: 0.625rem;
      width: 2.75rem;
      .btn-cancel-modal {
        border: none;
        outline: none;
        background-color: transparent;
        svg {
          width: 20px;
        }
      }
    }
    .preview-modal-container {
      display: flex;
      flex: 1 1;
      flex-direction: column;
      padding-top: 3.125rem;
      .modal-title {
        color: #2d2d2d;
        line-height: 3.5rem;
        margin: 0.375rem auto 2.875rem !important;
        text-align: center;
        width: 100%;
        font-size: 2.5rem;
        font-weight: 500;
      }
      .templates-preview-container {
        height: 70vh;
        margin-top: 0.625rem;
        overflow: auto;
        padding: 0 3.8em;
        .sect-templates-recomended {
          margin-bottom: 4rem;
          .temp-type {
            color: #2d2d2d;
            font-size: 1.5rem;
            font-weight: 500;
            line-height: 1.875rem;
            margin-bottom: 0.5rem;
            text-align: center;
          }
          .temp-description {
            color: #2d2d2d;
            font-size: 1rem;
            font-weight: 400;
            letter-spacing: 0.0187rem;
            line-height: 1.5rem;
            margin: 0 auto 2rem;
            max-width: 46.5rem;
            text-align: center;
          }
          .row-temps {
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
            .card-contaners {
              padding-left: 15px;
              padding-right: 15px;
              position: relative;
              flex: 0 0 33.333333%;
              max-width: 33.333333%;
              width: 100%;
            }
          }
        }
      }
    }
  }
}

/* Resume cards */
.flex-card {
  position: relative;
  display: flex;
  flex-direction: column;
  padding: 1rem;
  background-color: #d6ebf1;
  border-radius: 10px;
  height: 364px;
  :hover {
    --tw-bg-opacity: 1;
    background-color: rgb(249 250 251 / var(--tw-bg-opacity));
  }
  .resume-card_link {
    text-decoration: none;
    display: block;
    overflow: hidden;
    outline: none;
  }
  .card-ops {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 0.75rem;
    background-color: blue;
    .cta-edit {
      display: flex;
      padding-top: 0.5rem /* 8px */;
      padding-bottom: 0.5rem /* 8px */;
      padding-left: 1rem /* 16px */;
      padding-right: 1rem /* 16px */;
      border-width: 1px;
      border-color: transparent;
      font-size: 0.875rem /* 14px */;
      line-height: 1.25rem;
      color: white;
    }
  }
}
.mainres {
  border-radius: 0.25rem;
  box-shadow: 0 0 0.125rem 0 rgb(0 0 0 / 10%);
  min-height: 59.375rem;
  padding: 3rem 3.2rem;
  width: 46.5rem;
  transform: scale(0.4);
  transform-origin: top left;
}

.bg_white {
  background: white;
}
</style>
