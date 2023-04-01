<template>
  <div class="tag-input">
    <div v-for="(skill, index) in skills" :key="skill" class="tag-input_tag">
      {{ skill }}
      <svg
        @click="removeTag(index)"
        width="20"
        height="20"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="cancel_tag"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M6 18L18 6M6 6l12 12"
        />
      </svg>
    </div>
    <input
      type="text"
      placeholder="Enter a Tag"
      class="tag-input_text"
      @keydown="addTag"
    />
  </div>
</template>
<script setup>
// const props = defineProps({
//   skills: Array,
// });
import { ref } from "vue";

var skills = ref(["HTML"]);

function addTag(ev) {
  if (ev.code == "Comma" || ev.code == "Enter") {
    ev.preventDefault();
    console.log("Comma or Enter pressed");
    var val = ev.target.value.trim();
    console.log(val);
    if (val.length > 0) {
      skills.value.push(val);
      ev.target.value = "";
    }
  }
}

function removeTag(index) {
  skills.value.splice(index, 1);
}
</script>
<style lang="scss" scoped>
.tag-input {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  border: 1px solid #eee;
  font-size: 0.9em;
  height: auto;
  box-sizing: border-box;
  padding: 0 10px;

  .tag-input_tag {
    position: relative;
    display: flex;
    height: 30px;
    float: left;
    margin-right: 10px;
    //background-color: #eee;
    background-color: #6d5cab;
    margin-top: 10px;
    line-height: 30px;
    padding: 0 5px;
    border-radius: 5px;
    color: #eee;
    align-items: center;
    .cancel_tag {
      cursor: pointer;
    }
  }
}

.tag-input_text {
  border: none;
  outline: none;
  font-size: 0.9em;
  line-height: 50px;
  background: none;
  height: auto;
}
</style>
