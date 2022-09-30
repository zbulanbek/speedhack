<template>
    <account-layout>
    	<section class="bg-account">
    		<div class="account-title">
    			<img src="/images/icons/arrow-left-blue.svg"><span>Новости</span>
    		</div>
    		<div class="news-wrap">
<!--	    		<div class="row">-->
<!--		    		<template v-for="item in news">-->
<!--		    			<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 item-news">-->
<!--		    				<item-news :news="item"></item-news>-->
<!--		    			</div>-->
<!--					</template>-->
<!--				</div>-->

<!--				<div class="pagination_right_wrap">-->
<!--	                <pagination :pagination="pagination" @paginate="getNews()" offset="2"  v-if="count >= 6 ">-->
<!--	                </pagination>-->
<!--	            </div>-->
			</div>
    	</section>
    </account-layout>
</template>
<script>
	import ItemNews from '@/Speedhack/Components/Account/ItemNews';
	import Pagination from '@/Speedhack/Components/Details/Pagination';

	export default {
		props:{

		},
	    components: {
	    	ItemNews,
	    	Pagination
	    },
	    data() {
	        return {
	  			news: [],
	  			count: 0,
	            pagination: {
	                current_page: 1,
	            },
	        }
	    },
	    computed: {
	        remainder(amount, count) {
	            return amount - count % amount
	        },
	        package(amount, count) {
	            return Math.floor(count / amount);
	        },
	        params() {
	            return {
	                page: this.pagination.current_page,
	            };
	        }
	    },
	     methods: {
	        async getNews() {
	            const { data } = await window.axios.get(route('account.get.news').url(), { params: this.params });
	            this.news = data.news.data;
	            this.pagination = this.laraPaginate(data.news);
	            this.count = data.count;
	        },
	    },
	    mounted() {
	        this.getNews();
	    },
	}
</script>
<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
	}

	.account-title{
		font-family: "Inter-Bold", sans-serif;
		padding: 30px 20px;
		font-weight: 600;
		color: #050A1C;
		font-size: 24px;
		border-bottom: 1px solid #E0E3EB;
	}
	.account-title img{
		margin-right: 16px;
	}
	.item-news {
		margin-bottom: 20px;
	}
	.item-news .wrap-news-slider-item{
		padding: 0px;
		margin-bottom: 16px;
	}
	.news-wrap{
		padding-left: 60px;
		padding-right: 60px;
		padding-top: 40px;
	}
	@media only screen and (max-width: 767px) {
		.news-wrap{
			padding-left: 20px;
    		padding-right: 20px;
		}
	}

</style>
