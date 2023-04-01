<template>
  <div class="progress">
    <div class="progress_content">
      <div class="content_completeness">
        <div class="completeness_percentage">65</div>
        Profile Completeness
      </div>
      <div class="content_toAdd">
        <div class="toAdd">Fill all sections</div>
        <div class="completeness_toolTip">
          <svg
            width="24"
            height="24"
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
              d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"
            />
          </svg>
        </div>
      </div>
    </div>
    <div class="progress_bar">
      <div class="bar"></div>
    </div>
  </div>
</template>

<script setup></script>

<style lang="scss">
.progress {
  margin: 0 auto;

  .progress_content {
    display: flex;
    flex-flow: row nowrap;
    position: relative;
    .content_completeness {
      margin-right: 8px;
      margin-bottom: 8px;
      font-size: 16px;
      line-height: 20px;
      color: rgb(130, 139, 162);
      .completeness_percentage {
        display: inline-block;
        font-size: 16px;
        line-height: 20px;
        font-weight: 600;
        margin-right: 6px;
        color: rgb(51, 157, 93);
        font-variant-numeric: tabular-nums;
        &::after {
          margin-left: 2px;
          content: "%";
        }
      }
    }
    .content_toAdd {
      display: flex;
      flex: 1 1 0%;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: end;
      justify-content: flex-end;
      margin-bottom: 8px;
      .toAdd {
        text-align: right;
        white-space: nowrap;
        font-size: 16px;
        line-height: 20px;
        color: rgb(130, 139, 162);
        cursor: pointer;
        transition: opacity 0.4s ease 0s, transform 0.4s ease 0s;
        opacity: 1;
        transform: translateY(0px);
      }
      .completeness_toolTip {
        width: 26px;
        height: 20px;
        color: rgb(51, 157, 93);
        margin-left: 16px;
        position: relative;
        bottom: 2px;
        cursor: pointer;
        transition: background-color 0.1s ease 0s;
      }
    }
  }
  .progress_bar {
    height: 3px;
    background-color: rgb(239, 242, 249);
    .bar {
      height: 3px;
      width: 100%;
      transform-origin: left center;
      transform: scaleX(0.8);
      background-color: green;
    }
  }
}
</style>
