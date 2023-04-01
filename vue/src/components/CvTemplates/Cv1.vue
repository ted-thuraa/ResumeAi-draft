<template>
  <div class="inner">
    <div>
      <!-- profile section -->
      <div class="profile_sect">
        <div class="profile_inner">
          <div class="name_main">
            {{ model.first_name }} {{ model.last_name }}
          </div>
          <div class="sect_address sarif text-left">
            {{ model.email }}
            <br />
            {{ model.phone }}
            <br />
            {{ model.city }}, {{ model.state }}
          </div>
        </div>
      </div>

      <!-- summary -->
      <div class="sect sect-marg-top">
        <div class="sect_container">
          <div class="summary_title">
            <div class="section_title">
              <span>Summary</span>
            </div>
          </div>
          <div class="section_content">
            <div class="section_items">
              <div class="sarif margin-bot-1">
                <p>&nbsp;&nbsp;</p>
                <p>
                  {{ model.professional_summary }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- experience -->
      <div
        class="sect sect-marg-top"
        v-for="experience in model.experiences_data"
        :key="experience.id"
      >
        <div class="exper_container">
          <div class="employment_exp sect_container">
            <div class="exp_title">
              <div class="section_title">
                <span>Experience</span>
              </div>
            </div>
            <div class="sect_content">
              <div class="section_items">
                <div class="item_container">
                  <div class="item_title section_title">
                    <span>{{ experience.job_title }}</span>
                  </div>
                  <div class="sarif">
                    <span>{{ experience.employer }}</span>
                    <span>.</span>
                    <span>{{ experience.job_city }}</span>
                  </div>
                  <div class="item_dates sarif">
                    <span class="employment_start_year">{{
                      experience.startjob_date
                    }}</span>
                    <span class="employment_end_year">{{
                      experience.endjob_date
                    }}</span>
                  </div>
                  <ul class="item_description sarif">
                    <li>
                      {{ experience.description }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- skills -->
      <div class="sect sect-marg-top">
        <div class="skills_inner">
          <div class="skill_title">
            <div class="section_title">
              <span>Skills</span>
            </div>
          </div>
          <div class="skills_content">
            <div>
              <div class="sarif">
                {{ model.skills }}
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- education -->
      <div
        class="sect sect-marg-top"
        v-for="education in model.education_data"
        :key="education.id"
      >
        <div class="exper_container">
          <div class="employment_exp">
            <div class="sect_title">
              <div class="section_title">
                <span>Education</span>
              </div>
            </div>
            <div class="sect_content">
              <div class="section_items">
                <div class="item_container">
                  <div class="item_title section_title">
                    <span>{{ education.school_name }}</span>
                  </div>
                  <div sarif>
                    <span>{{ education.school_city }}</span>
                    <span>.</span>
                    <span>{{ education.school_state }}</span>
                  </div>
                  <div class="item_dates sarif">
                    <span class="employment_start_year">{{
                      education.startschool_date
                    }}</span>
                    <span class="employment_end_year">{{
                      education.endschool_date
                    }}</span>
                  </div>
                  <div class="item_description sarif">
                    <p>
                      {{ education.school_description }}
                    </p>
                  </div>
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
const { model } = defineProps({
  model: Object,
});
</script>

<style lang="scss">
/* ResumeTemplate */

.inner {
  color: black;
  font-family: Forno, "Source Sans Pro", sans-serif;
  background-color: white;
  font-size: 12px;
  display: block;
  width: 670;
  max-width: 700px;
}

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
}

.section_title span {
  color: rgb(15, 15, 15);
  outline: unset;
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
</style>
