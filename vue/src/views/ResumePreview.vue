<template>
    <pageComponent>
        <div class="preview-dash">
            <div class="preview-dash_container">
                <div class="finalize-preview">
                    <div class="rez-title">Untitled1</div>
                    <div class="rez-preview">
                        <div class="preview-canvas">
                            <div class="resume-outer">
                                <!-- resume goes here -->
                                <div class="flex-card h-auto">
                                    <a href="#" class="resume-card_link">
                                        <div class="mainres-sect bg_white">
                                            <Cv2 />
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="preview-dash_right"></div>
            </div>
        </div>
    </pageComponent>
</template>

<script setup>
import pageComponent from "../components/PageComponent.vue";
//import Cv1 from "../components/CvTemplates/Cv1.vue";
import Cv2 from "../components/CvTemplates/Cv2.vue";
</script>

<style lang="scss">
.preview-dash {
    position: relative;
    width: 100%;
    height: 100vh;
    margin-top: 58px;
    .preview-dash_container {
        display: flex;
        height: 100%;
        overflow: auto;
        padding: 16px 24px 24px 0;
        .finalize-preview {
            display: block;
            flex: 70%;
            border-radius: 32px;
            padding: 32px 32px 0 32px;
            overflow: auto;
            height: 100%;
            //display: flex;
            //flex-direction: column;
            .rez-title {
                font-weight: 500;
                font-size: 2em;
                color: black;
                text-align: center;
                margin-bottom: 10px;
            }
            .rez-preview {
                height: 100%;
                .preview-canvas {
                    height: 100%;
                    .resume-outer {
                        margin: 0;
                        height: 100%;
                    }
                }
            }
        }
    }

    .h-auto {
        height: auto;
    }
    .preview-dash_right {
        //padding-bottom: 32px;
        background-color: var(--projects-section);
        //margin-left: 24px;
        flex: 30%;

        border-radius: 30px;
        position: relative;
        overflow: auto;
        transition: all 300ms cubic-bezier(0.19, 1, 0.56, 1);
    }
}

/* resume card */
.flex-card {
    position: relative;
    display: flex;
    flex-direction: column;
    padding: 1rem;
    background-color: #d6ebf1;
    border-radius: 10px;
    height: 364px;
    //:hover {
    //    --tw-bg-opacity: 1;
    //    background-color: rgb(249 250 251 / var(--tw-bg-opacity));
    //}
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
.mainres-sect {
    border-radius: 0.25rem;
    box-shadow: 0 0 0.125rem 0 rgb(0 0 0 / 10%);
    min-height: 59.375rem;
    padding: 3rem 3.2rem;
    width: 46.5rem;
    transform: scale(1);
    transform-origin: top left;
}

.bg_white {
    background: white;
}
</style>
