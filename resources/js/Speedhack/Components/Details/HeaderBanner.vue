<template>
    <header class="header-welcome">
        <a href="/" class="logo_main">
            <img src="/images/logo.png" alt="logo">
        </a>

        <ul class="links" :class="{'active': mobileMenu}">
           <!--  <li class="item"><a href="/news">Новости</a></li> -->
            <li class="item"><a href="/all/courses">Витрина курсов</a></li>
            <li class="item teacher" @mouseover="teacherActive = true" @mouseleave="teacherActive = false">
                <a>Для кого</a>
                <transition name="fade">
                    <div class="h-dropdown" v-if="teacherActive" @click="teacherActive = false">
                        <a href="/" class="item-wrap"><img src="/images/icons/student-h.svg"> Стать учеником</a>
                        <a href="/teacher" class="item-wrap"><img src="/images/icons/teacher-h.svg"> Стать учителем</a>
                        <a href="/" class="item-wrap"> <img src="/images/icons/company-h.svg"> Компаниям</a>
                    </div>
                </transition>
            </li>
            <li class="item" @click="showLoginModal">
                <a :href="this.$page.props.user ? route('home'): 'javascript:void(0)'">
                    <img src="/images/icons/log-in.svg" alt="login"> Войти
                </a>
            </li>
        </ul>
        <button @click="toggleMenu" class="menu-btn">
            <img src="/images/icons/menu-mobile.svg" alt="mobile-menu">
        </button>

        <modal name="loginModel"
               :width="450"
               :height="500"
               :adaptive="true">
            <login-modal></login-modal>
        </modal>

    </header>
</template>
<script>
import LoginModal from '@/Speedhack/Components/Modals/LoginModal';

export default {
    data() {
        return {
            mobileMenu: false,
            teacherActive: false
        }
    },
    components: {
        LoginModal,
    },
    methods: {
        toggleMenu() {
            this.mobileMenu = !this.mobileMenu;
        },
        showLoginModal() {
            this.$modal.show('loginModel');
        },
        showDropdown: function () {
            this.teacherActive = !this.teacherActive;
        }
    },
}
</script>

<style scoped>

.header-welcome {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 42px 0px;
}

.header-welcome .logo_main {
    width: 187px;
}

.header-welcome .links {
    display: flex;
    align-items: center;
    margin-bottom: 0px;
}

.header-welcome .links .item {
    margin-right: 90px;
}

.header-welcome .links .item:last-child {
    margin-right: 0px;
}

.header-welcome .links .item a {
    font-family: 'Inter', sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 32px;
    color: #FFFFFF;
    text-decoration: none;
}

.menu-btn {
    display: none;
    background-color: transparent;

}

.header-welcome .links .item:hover {
    cursor: pointer;
}

.menu-btn img {
    width: 35px;
    height: 35px;
}

.teacher {
    position: relative;
}

.teacher .h-dropdown {
    position: absolute;
    top: auto;
    width: 200px;
    left: 0px;
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
    /*margin-top: 10px;*/
    box-shadow: 0 2px 34px rgb(31 42 51 / 15%);
}

.teacher .h-dropdown a {
    padding: 10px 15px;
    display: block;
    color: #050A1C !important;
    border-bottom: 1px solid #b5b5b5;
}

.teacher .h-dropdown a:hover {
    background-color: rgba(0, 62, 203, .1);
}

.teacher.active .h-dropdown {
    display: block;
}

.fade-enter-active, .fade-leave-active {
    transition: opacity .2s;
}

.fade-enter, .fade-leave-active {
    opacity: 0;
}

.h-dropdown a img {
    width: 30px;
    height: 28px;
    margin-right: 10px;
}

.h-dropdown .item-wrap {
    display: flex !important;
    font-size: 16px !important;
    align-items: center !important;
}

@media only screen and (max-width: 768px) {
    .header-welcome .links {
        width: 100%;
        flex-direction: column;
        align-items: flex-start;
        display: none;
        transition: all .3s linear;
        margin-top: 20px;
    }

    .header-welcome .links.active {
        display: flex;
        animation: fade-in 1s;
    }

    .header-welcome .links .item {
        margin-right: 0px;
        padding: 10px;
        width: 100%;
    }

    .header-welcome {
        flex-direction: column;
        align-items: flex-start;
        position: relative;
    }

    .menu-btn {
        display: block;
        position: absolute;
        top: 42px;
        right: 15px;
    }

    .teacher .h-dropdown {
        position: inherit;
        width: 100%;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
}


</style>
