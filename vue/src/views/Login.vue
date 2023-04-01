<template>
    <div class="form-inner">
        <div class="title-sect">
            <h1 class="title">Welcome Back</h1>
            <p class="desc">Log in</p>
        </div>
        <form @submit="login" class="is-block">
            <div v-if="errorMsg" class="">
                {{ errorMsg }}
                <span @click="errorMsg = ''" class=""></span>
            </div>
            <div class="form-item">
                <label for="Email" className="name-field">Email</label>
                <input
                    v-model="user.email"
                    type="email"
                    name="email"
                    autocomplete="email"
                    required=""
                    id="email"
                    placeholder="exampleaddress"
                    className="name-textfield"
                />
            </div>
            <div class="form-item">
                <label for="Password" className="name-field">Password</label>
                <input
                    v-model="user.password"
                    type="password"
                    name="password"
                    id="password"
                    autocomplete="current-password"
                    required=""
                    placeholder="password"
                    className="name-textfield"
                />
            </div>
            <div class="form-item">
                <input
                    id="remember-me"
                    name="remember-me"
                    type="checkbox"
                    v-model="user.remember"
                    class="chck-box_remember"
                />
                <label for="remember-me" class="label-rememberme"
                    >Remember me</label
                >
            </div>

            <div class="form-btn">
                <button type="submit" class="is-btn_form">Log in</button>
            </div>
        </form>
        <div class="opt-login">
            <p>
                Not registered?
                <router-link :to="{ name: 'Register' }" class="Link"
                    >Sign Up</router-link
                >
            </p>
        </div>
    </div>
</template>

<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";
import store from "../store";

const router = useRouter();

const user = {
    email: "",
    password: "",
    remember: false,
};

function login(ev) {
    ev.preventDefault();

    store
        .dispatch("login", user)
        .then((res) => {
            router.push({
                name: "Dashboard",
            });
        })
        .catch((err) => {
            errorMsg.value = err.response.data.error;
        });
}
</script>

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
                    .chck-box_remember {
                        height: 1rem;
                        width: 1rem;
                        border-radius: 0.25rem /* 4px */;
                        --tw-border-opacity: 1;
                        border-color: rgb(
                            209 213 219 / var(--tw-border-opacity)
                        );
                        --tw-text-opacity: 1;
                        color: rgb(79 70 229 / var(--tw-text-opacity));
                        &:focus {
                            --tw-ring-opacity: 1;
                            --tw-ring-color: rgb(
                                99 102 241 / var(--tw-ring-opacity)
                            );
                        }
                    }
                    .label-rememberme {
                        margin-left: 0.5rem;
                        display: block;
                        font-size: 0.875rem /* 14px */;
                        line-height: 1.25rem /* 20px */;
                        --tw-text-opacity: 1;
                        color: rgb(17 24 39 / var(--tw-text-opacity));
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
