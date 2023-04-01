<template>
    <div class="is-auth">
        <div class="auth-container">
            <div class="is-auth_hero">
                <div class="hero">
                    <div class="is-opaque"></div>
                    <img src="../assets/images/discovery.jpg" />
                </div>
            </div>
            <div class="is-auth_form">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script setup></script>

<style lang="scss">
.is-auth {
    position: relative;
    height: 100vh;
    width: 100%;
    .auth-container {
        position: relative;
        display: flex;
        flex-direction: row;
        .is-auth_hero {
            position: relative;
            width: 55%;
            height: 100%;
            .hero {
                width: 100%;
                height: 100vh;
                position: relative;
                top: 0;
                left: 0;
                .is-opaque {
                    position: absolute;
                    background-color: blue;
                    opacity: 0.3;
                    width: 100%;
                    height: 100%;
                }
                img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
            }
        }
    }
    .is-auth_form {
        position: relative;
        width: 45%;

        .form-inner {
            top: 50px;
            height: auto;
            padding-left: 8em;
            position: relative;
            display: block;
            align-items: center;
            justify-content: center;
            .title-sect {
                display: block;
                margin-bottom: 63px;
                .title {
                    font-weight: 700;
                    font-size: 2em;
                }
                .desc {
                    font-weight: 300;
                    font-size: 12px;
                }
            }
            .is-block {
                //padding: 5em;
                display: block;
                height: 100%;
                .form-item {
                    margin-bottom: 15px;
                    .name-field {
                        width: 100%;
                        margin-bottom: 6px;
                        color: black;
                        letter-spacing: 0.1px;
                        font-size: 0.9em;
                        text-transform: uppercase;
                        display: block;
                    }
                    .name-textfield {
                        height: 38px;
                        width: 80%;
                        border: 1px solid rgb(173 173 173);
                        border-radius: 5px;
                        background-color: white;
                        padding-left: 13px;
                    }
                }
                .form-btn {
                    //display: flex;
                    //align-items: center;
                    //justify-content: center;
                    margin-bottom: 30px;
                    .is-btn_form {
                        padding: 10px 30px;
                        border-radius: 10px;
                        outline: none;
                        color: white;
                        font-weight: 400;
                        background-color: rgb(71, 71, 150);
                    }
                }
            }
            .opt-login {
                p {
                    font-weight: 500;
                    .link {
                        color: blue;
                    }
                }
            }
        }
    }
}
</style>
