<template>
	<header class="header-white">
		<div class="container">
			<div class="wrap-header-white">
				<a href="/" class="logo_main">
					<img src="/images/logo_2.png">
				</a>

				<ul class="links" :class="{'active': mobileMenu}">
					<!-- <li class="item"><a href="/news">Новости</a></li> -->
					<li class="item"><a href="/all/courses">Витрина курсов</a></li>
					<li class="item"><a href="/teacher">Стать учителем</a></li>
					<li class="item" @click="showLoginModal"><a> <img src="/images/icons/log-in-black.svg"> Войти</a></li>
				</ul>
				<button @click="toggleMenu" class="menu-btn"><img src="/images/icons/menu-header-blue.svg"></button>

				<modal name="loginModel"
		            :width="450"
		            :height="500"
		            :adaptive="true">
		            <login-modal></login-modal>
		        </modal>
			</div>
		</div>
	</header>
</template>
<script>
	import LoginModal from '@/Speedhack/Components/Modals/LoginModal';
	export default {
		data() {
	        return {
	           	mobileMenu: false
	        }
	    },
	    components: {
	        LoginModal,
	    },
	    methods: {
	        toggleMenu(){
	            this.mobileMenu = !this.mobileMenu;
	        },
	        showLoginModal(){
	        	this.$modal.show('loginModel');
	        }
	    }
   	}
</script>

<style scoped>
	.header-white{
		padding: 20px 0px;
		border-bottom: 1px solid  #E0E3EB;
	}
	.wrap-header-white{
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.logo_main{
		width: 187px;
	}
	.logo_main img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	.wrap-header-white .links{
		display: flex;
		align-items: center;
		margin-bottom: 0px;
	}
	.wrap-header-white .links .item{
		margin-right: 90px;
	}
	.wrap-header-white .links .item:hover{
		cursor: pointer;
	}
	.wrap-header-white .links .item:last-child{
		margin-right: 0px;
	}
	.wrap-header-white .links .item a{
		font-family: 'Inter', sans-serif;
		font-style: normal;
		font-weight: normal;
		font-size: 18px;
		line-height: 32px;
		color: #050A1C;;
		text-decoration: none;
	}

	.menu-btn{
		display: none;
		background-color: transparent;

	}
	.menu-btn img{
		width: 35px;
		height: 35px;
	}
	@media only screen and (max-width: 768px) {
		.wrap-header-white .links{
			width: 100%;
			flex-direction: column;
			align-items: flex-start;
			display: none;
			transition: all .3s linear;
			margin-top: 20px;
		}
		.wrap-header-white .links.active{
			display: flex;
			animation: fade-in 1s;
		}
		.wrap-header-white .links .item{
			margin-right: 0px;
			padding: 10px;
			width: 100%;
		}

		.wrap-header-white{
			flex-direction: column;
			align-items: flex-start;
			position: relative;
		}

		.menu-btn{
			display: block;
			position: absolute;
			top: 0px;
			right: 0px;
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

