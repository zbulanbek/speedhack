<template>
	<section class="comments-block">
		<block-title
	        :title="$page.props.sets['main.feedback.title']"
	        :subtitle="$page.props.sets['main.feedback.subtitle']"
	    ></block-title>
	    <div class="container">
	    	<div class="raiting">
		    	<span class="number">{{avg}}</span>
		    	<stars :count="avg"></stars>
		    	<span class="info">{{comments.length}} оценок</span>
		    </div>
		    <div class="commnets-wrap">
		    	<template v-for="item in comments">
		    		<item-comment
		    			:comment="item"
			    	 	></item-comment>
		    	</template>
		    </div>
		    <a href="/comments" class="btn-link">Посмотреть все отзывы</a>
	    </div>
	</section>
</template>
<script>
	import BlockTitle from '@/Speedhack/Components/Details/BlockTitle';
	import Stars from '@/Speedhack/Components/Details/Stars';
	import ItemComment from '@/Speedhack/Components/Details/ItemComment';
	export default {
	    props: {
	        comments:Array,
            avg: Number,
        },
   	components: {
      	BlockTitle,
      	Stars,
      	ItemComment
    },
     data() {
        return {
        	// stars: 4.5,
           // 	commnets: [
           // 		{
           // 			name: "Махметова Азиза",
           // 			img: "/images/users/avatar-1.jpg",
           // 			stars: 3,
           // 			text: "Этот курс прошел на Ураа! Отдельно ограмное спасибо моему учителю Айдын агай. Сейчас мой уровень английского языка стал намного лучше и программа у вас самая Этот курс прошел на Ураа! Отдельно ограмное спасибо моему учителю Айдын агай. Сейчас мой уровень английского языка стал намного лучше и программа у вас самая.",
           // 			date: "03.12.20",
           // 		},
           // 		{
           // 			name: "Махметова Азиза 2",
           // 			img: "/images/users/avatar-1.jpg",
           // 			stars: 2,
           // 			text: "Этот курс прошел на Ураа! Отдельно ограмное спасибо моему учителю Айдын агай. Сейчас мой уровень английского языка стал намного лучше и программа у вас самая Этот курс прошел на Ураа! Отдельно ограмное спасибо моему учителю Айдын агай. Сейчас мой уровень английского языка стал намного лучше и программа у вас самая.",
           // 			date: "03.12.20",
           // 		},
           // ]


        }
	},
}
</script>
<style scoped>
	.raiting{
		display: flex;
		align-items: center;
		margin-bottom: 32px;
	}
	.number{
		font-family: 'Inter', sans-serif;
		font-weight: 600;
		font-size: 46px;
		color: #003ECB;
		margin-right: 40px;
	}
	.info{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 20px;
		margin-left: 40px;
	}
	.btn-link{
		font-family: 'Inter', sans-serif;
		font-style: normal;
		font-weight: 500;
		font-size: 18px;
		color: #003ECB;
		margin-top: 12px;
	}
	.btn-link:hover{
		text-decoration: none;
		color: #003ECB;
	}
	.comments-block{
		margin-bottom: 100px;
	}

	@media only screen and (max-width: 768px) {
		.raiting{
			flex-wrap: wrap;
		}
		.info{
			margin: 0px;
		}
	}
</style>
