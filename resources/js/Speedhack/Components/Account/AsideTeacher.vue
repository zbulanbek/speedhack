<template>
	<aside class="ponel-wrap" :class="{'active': activeClass}">
		<div class="avatar-wrap">
			<div class="avatar-small">
				<img :src="$page.props.user.profile_photo_url" v-if="$page.props.user.profile_photo_url">
				<img src="/images/users/avatar-1.jpg" v-else>
			</div>
			<div class="avatar-big">
				<img :src="$page.props.user.profile_photo_url" v-if="$page.props.user.profile_photo_url">
				<img src="/images/users/avatar-1.jpg" v-else>
			</div>
			<div class="name-wrap">
				<span class="name">{{ $page.props.user.name }}
					{{ $page.props.user.surname }}</span>
				<a href="/teacher/profile" class="subtitle">Твой аккаунт</a>
			</div>
		</div>

		<ul class="links-wrap">
			<li>
				<a href="/account/profile" class="links-item" :class="{'active': route().current() == 'teacher.profile'}">
					<div class="icon icon-8"></div>
					<div class="text">
						Мой профиль
					</div>
				</a>
			</li>
			<li>
				<a href="/teacher/courses" class="links-item" :class="{'active': route().current() == 'teacher.courses'}">
					<div class="icon icon-1"></div>
					<div class="text">
						Мои курсы
					</div>
				</a>
			</li>
			<li>
				<a href="/teacher/calendar" class="links-item" :class="{'active': route().current() == 'teacher.calendar'}">
					<div class="icon icon-3"></div>
					<div class="text">
						Мое расписание
					</div>
				</a>
			</li>
			<li>
				<a href="/teacher/homework" class="links-item" :class="{'active': route().current() == 'teacher.homework'}">
					<div class="icon icon-4"></div>
					<div class="text">
						Домашняя работа
					</div>
				</a>
			</li>
			<!-- <li>
				<a href="/account/webinars" class="links-item" :class="{'active': route().current() == 'teacher.webinars'}">
					<div class="icon icon-1"></div>
					<div class="text">
						Вебинары
					</div>
				</a>
			</li> -->
		</ul>

		<div class="logout-btn-wrap">
			<button class="logout-btn" @click="logout">
				<img src="/images/icons/log-out.svg">
				<b>Выйти</b>
			</button>
		</div>

	</aside>
</template>
<script>
	export default {
	    props: {
	      	activeClass: Boolean,
	    },
	    methods: {
            async logout() {
                const { data, status } = await window.axios.post(route('logout').url());
                if (status === 204) {
                    window.location = route('welcome').url();
                }
            }
	    }
	}
</script>
<style scoped>
	.ponel-wrap{
		background-color: #fff;
		min-width: 300px;
		width: 300px;
		border-right: 1px solid #E0E3EB;
		transition: all .5s ease;
		/*transition-delay: .5s;*/
	}

	.avatar-wrap{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding-top: 30px;
		padding-bottom: 20px;
	}
	.avatar-big{
		width: 120px;
		height: 120px;
		border-radius: 50%;
		overflow: hidden;
		margin-bottom: 16px;
	}
	.avatar-small{
		width: 70px;
		height: 70px;
		border-radius: 50%;
		overflow: hidden;
		margin-bottom: 16px;
		display: none;
	}
	.avatar-small img{
		width: 100%;
		height: 100%;
	}
	.avatar-wrap .name-wrap{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		height: auto;
		width: auto;
		opacity: 1;
		transition: opacity .3s ease;
		transition-delay: .5s;
	}
	.avatar-wrap .name-wrap .name{
		font-family: "Inter", sans-serif;
		font-size: 16px;
		color: #7B838B;
	}
	.avatar-wrap .name-wrap .subtitle{
		font-family: "Inter", sans-serif;
		font-size: 16px;
		color: #B5B4B4;
	}
	.avatar-big img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.links-item{
		padding-left: 36px;
		display: flex;
		padding-top: 20px;
		padding-bottom: 20px;
	}
	.links-item.active{
		background: rgba(159, 170, 197, 0.07);
		padding-left: 31px;
		border-left: 5px solid #003ECB;
	}
	.links-item .icon{
		width: 24px;
		height: 24px;
		min-width: 24px;
		min-height: 24px;
		padding-right: 65px;
		background-image: url('/images/icons/icon-1.svg');
		background-repeat: no-repeat;
		background-image: 100% 100%;
	}
	.links-wrap{
		margin-bottom: 80px;
	}
	.links-item .icon.icon-2{
		background-image: url('/images/icons/icon-2.svg');
	}
	.links-item .icon.icon-3{
		background-image: url('/images/icons/icon-3.svg');
	}
	.links-item .icon.icon-4{
		background-image: url('/images/icons/icon-4.svg');
	}
	.links-item .icon.icon-5{
		background-image: url('/images/icons/icon-5.svg');
	}
	.links-item .icon.icon-6{
		background-image: url('/images/icons/icon-6.svg');
	}
	.links-item .icon.icon-7{
		background-image: url('/images/icons/icon-7.svg');
	}
	.links-item .icon.icon-8{
		background-image: url('/images/icons/icon-8.svg');
	}

	.links-item.active .icon.icon-1{
		background-image: url('/images/icons/icon-1-b.svg');
	}
	.links-item.active .icon.icon-2{
		background-image: url('/images/icons/icon-2-b.svg');
	}
	.links-item.active .icon.icon-3{
		background-image: url('/images/icons/icon-3-b.svg');
	}
	.links-item.active .icon.icon-4{
		background-image: url('/images/icons/icon-4-b.svg');
	}
	.links-item.active .icon.icon-5{
		background-image: url('/images/icons/icon-5-b.svg');
	}
	.links-item.active .icon.icon-6{
		background-image: url('/images/icons/icon-6-b.svg');
	}
	.links-item.active .icon.icon-7{
		background-image: url('/images/icons/icon-7-b.svg');
	}
	.links-item.active .icon.icon-8{
		background-image: url('/images/icons/icon-8-b.svg');
	}
	.links-item .text{
		font-family: "Inter", sans-serif;
		font-size: 16px;
		color: #7B838B;
		transition: opacity .3s ease;
		opacity: 1;
		transition-delay: .5s;
	}
	.links-item.active .text{
		color: #003ECB;
	}
	.logout-btn-wrap{
		padding-left: 36px;
		padding-right: 36px;
		padding-bottom: 100px;
	}
	.logout-btn{
		border: none;
		background: rgba(224, 229, 240, 0.4);
		border-radius: 8px;
		padding: 13px;
		width: 100%;
		font-size: 16px;
		line-height: 22px;
		color: #7B838B;
		text-align: center;
		position: relative;
	}
	.logout-btn b{
		font-weight: normal;
	}
	.logout-btn img{
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		left: 13px;
	}

	.ponel-wrap.active .avatar-big{
		display: none;
	}
	.ponel-wrap.active .avatar-small{
		display: block;
	}
	.ponel-wrap.active .name-wrap{
		transition: opacity .3s ease;
      	opacity: 0;
      	pointer-events: none;
      	width: 0px;
      	overflow: hidden;
      	height: 0px;
      	transition-delay: .5s;
	}

	.ponel-wrap.active .links-item .text{
		opacity: 0;
		pointer-events: none;
		height: 0px;
		width: 0px;
		overflow: hidden;
		transition: opacity .3s linear;
		transition-delay: .4s;
	}

	.ponel-wrap.active .logout-btn b{
		display: none;
	}
	.ponel-wrap.active .logout-btn img{
		position: initial;
		top: initial;
		transform: initial;
		left: initial;
	}
	.ponel-wrap.active .logout-btn-wrap{
		padding-right: 20px;
	    padding-left: 20px;
	}

	.ponel-wrap.active{
		min-width: 100px;
		width: 100px;
		transition-delay: .6s;
		transition: all .4s ease;
	}

	@-webkit-keyframes sidebarAnim {
	  0% {
	    opacity: 1;
	  }
	  80% {
	   opacity: 0;
	    pointer-events: none;
	  }
	  100% {
	   position: absolute;
	  }
	}

	@keyframes sidebarAnim {
	  0% {
	    opacity: 1;
	  }
	  80% {
	   opacity: 0;
	    pointer-events: none;
	  }
	  100% {
	   position: absolute;
	  }
	}

	@media only screen and (max-width: 768px) {
	 	.ponel-wrap.active{
			min-width: 0px;
			width: 0px;
			left: -10px;
			overflow: hidden;
		}
		.ponel-wrap{
			position: absolute;
			top: 0px;
			left: 0px;
			min-width: 300px;
			height: 100%;
		   	z-index: 20;
		}

	}
</style>
