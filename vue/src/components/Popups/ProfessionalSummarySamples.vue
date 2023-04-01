<template>
  <div class="suggestion_sect">
    <div class="suggestion_box-nav">
      <div @click="ToggleSummaryModal()" class="cancel-sum_box">
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
      </div>
      <div class="nav-prewrtitten_samples">
        <div class="nav-samples">Samples</div>
        <div class="nav-ai_samples">Ai Samples</div>
      </div>
    </div>
    <div class="suggestion_box-content">
      <div class="suggestion_box-header">
        <h3>Ai summary writter</h3>
        <p>Write Ai pre-written samples for a targeted job position.</p>
      </div>

      <form action="#">
        <div class="isgpt-title_sect">
          <div class="form-item">
            <label for="FirstName" className="name-field"
              >position Highlight</label
            >
            <input
              type="text"
              name="Firstname"
              id="FirstName"
              autocomplete="firstname"
              placeholder="First Name"
              className="name-textfield"
            />
          </div>
        </div>
        <div class="isgpt_skill">
          <span>Skills Highlight</span>
          <TagInput />
        </div>
        <div class="cta-suggest">
          <button>Ai Writer</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  ToggleSummaryModal: Function,
});

const emit = defineEmits(["ToggleSummaryModal"]);
</script>

<style lang="scss">
.suggestion_sect {
  position: fixed;
  height: 560px;
  width: 480px;
  top: 6.5em;
  left: 48.6em;
  right: 0;
  bottom: 0;
  //z-index: 99;
  overflow: hidden;
  overflow-y: scroll;
  z-index: 15;

  //margin-left: 16px;
  border-radius: 3px;

  background: rgb(255, 255, 255);
  box-shadow: rgb(23 68 130 / 20%) 0px 0px 1px,
    rgb(23 68 130 / 15%) 0px 2px 14px;
  opacity: 1;
  .suggestion_box-nav {
    color: white;
    background: linear-gradient(
      180deg,
      rgba(46, 32, 122, 1) 0%,
      rgba(91, 68, 159, 1) 83%
    );
    .cancel-sum_box {
      display: flex;
      color: #fff;
      padding: 0.2em 1em;
      align-items: center;
      justify-content: end;

      svg {
        width: 25px;
        height: 25px;
        position: relative;
        fill: currentColor;
      }
    }
    .nav-prewrtitten_samples {
      padding: 2em;
      display: flex;
      flex-direction: row;
      //margin-top: 0.5em;
      //padding: 10px;

      .nav-samples {
        width: 95px;
        height: 35px;
        margin-right: 10px;

        border-bottom: 1px solid #fff;
      }
      .nav-ai_samples {
        width: 95px;
        height: 35px;
      }
    }
  }
  .suggestion_box-header {
    padding: 10px 15px;
    color: #424242;
    text-align: center;
  }
  .suggestion_box-content {
    form {
      .isgpt-title_sect {
        .form-item {
          padding-right: 1.2em;
          padding-left: 1.2em;
          padding-bottom: 24px;
          padding-top: 24px;
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
      .isgpt_skill {
        color: rgb(137 137 137);
        padding-right: 1.2em;
        padding-left: 1.2em;
        padding-bottom: 24px;
        padding-top: 24px;
      }
      .cta-suggest {
        justify-content: center;
        display: flex;
        button {
          margin: 0.7em;
          margin-left: 10px;
          padding: 0.8em 2.7em;
          border: none;
          border-radius: 9px;

          background-image: linear-gradient(
            83.2deg,
            rgba(150, 93, 233, 1) 10.8%,
            rgba(99, 88, 238, 1) 94.3%
          );
          //background-color: rgb(71, 71, 150);
          color: white;
        }
      }
    }
  }
}
</style>
