<template>
  <div class="inner">
    <div class="arial">
      <div class="re-profile sect">
        <div class="re-profile_name mrg-bottom">
          <h1>Williams Keith</h1>
        </div>
        <div class="re-profile_contacts">
          <span>123 Main Street sanFransisco, CA</span>
          <span>415-343-3432</span>
          <span>keithwilliams@gmail.com</span>
        </div>
      </div>
      <div class="re-summary sect">
        <div class="sect_title mrg-bottom">
          <h2>Professsional Summary</h2>
        </div>
        <div class="content">
          <p>
            Software engineer with 7 years of experience in developing, testing
            and deploying complex software applications. Skilled in designing,
            coding, debugging and troubleshooting software programs. Experience
            in creating efficient database systems and implementing new
            technologies to improve scalability and performance of applications.
            Applying for a Software Engineer position at Company A.
          </p>
        </div>
      </div>
      <div class="re-experience sect">
        <div class="sect_title mrg-bottom">
          <h2>Experience</h2>
        </div>
        <div class="content">
          <div class="is-exp">
            <h4>Software Engineer</h4>
            <p><span>Microsoft</span>-<span>San fransisco, CA</span></p>
            <ul>
              <li>Deveoped VS code Darktheme</li>
              <li>Successfullly installed windows 11</li>
              <li>Tried to hack Google 2 times</li>
              <li>Learnt alot of quack stuff</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="re-skills sect">
        <div class="sect-title mrg-bottom">
          <h2>Skills</h2>
        </div>
        <div class="content">
          <p>
            java, vaja, python, hacking, csrf attacks, phishing, lazy, and much
            more
          </p>
        </div>
      </div>
      <div class="re-education sect">
        <div class="sect-title mrg-bottom">
          <h2>Education</h2>
        </div>
        <div class="content">
          <p>Masters Software Development</p>
          <p>san fransisco state uniersity CA.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup></script>

<style lang="scss">
h1 {
  font-size: 30px;
  line-height: 24px;
  font-weight: bold;
}
.inner {
  color: black;
  background-color: white;
  display: block;
  width: 670;
  max-width: 700px;
}
.arial {
  font-family: Arial;
  font-size: 12px;
}

.sect {
  width: 100%;
  display: block;
}

.mrg-bottom {
  margin-bottom: 10px;
}

.sect_title {
  font-size: 15px;
  line-height: 18px;
  font-weight: bold;
  color: rgb(61, 61, 61);
}

p,
ul,
li,
.content {
  font-size: 13px;
  line-height: 16px;
}
</style>
