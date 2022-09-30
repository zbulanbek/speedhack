<template>
	<welcome-layout>
		<header-white></header-white>
		<bread :breads="breads"></bread>
		<banner-white :course="course" :cases="cases"></banner-white>
		<course-info :info="info"></course-info>
		<course-facts :facts="facts_course"></course-facts>
		<course-certificate :certificate="certificate"></course-certificate>
		<course-plans :programs="programs"></course-plans>
		<banner-free-lesson></banner-free-lesson>
		<comments-block :avg="avg" :comments="comments"></comments-block>
		<form-request-special :classes="classes"></form-request-special>
	</welcome-layout>
</template>
<script>
	import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';
	import Bread from '@/Speedhack/Components/Details/Bread';
	import BannerWhite from '@/Speedhack/Components/Details/BannerWhite';
	import CourseInfo from '@/Speedhack/Components/Details/CourseInfo';
	import CourseFacts from '@/Speedhack/Components/Details/CourseFacts';
	import CourseCertificate from '@/Speedhack/Components/Details/CourseCertificate';
	import BannerFreeLesson from '@/Speedhack/Components/Details/BannerFreeLesson';
	import CommentsBlock from '@/Speedhack/Components/Details/CommentsBlock';
	import CoursePlans from '@/Speedhack/Components/Details/CoursePlans';
	import FormRequestSpecial from '@/Speedhack/Components/Details/FormRequestSpecial';

	export default {
	    props: {
	        course: Object,
            cases: Array,
            facts_course: Array,
            info: Array,
            programs: Array,
            certificate: Object,
            comments: Array,
            avg: Number,
            classes: Array
	    },
	    components: {
	        HeaderWhite,
	        Bread,
	        BannerWhite,
	        CourseInfo,
	        CourseFacts,
	        CourseCertificate,
	        BannerFreeLesson,
	        CommentsBlock,
	        CoursePlans,
	        FormRequestSpecial
	    },
	    data() {
	        return {
	           breads: [
	           		{
	           			title: "Главная",
	           			link: "/",
	           		},
	           		{
	           			title: "Наши курсы",
	           			link: "/all/courses",
	           		},
           		],
	        }
	    },
	    methods: {

		}
	}
</script>
<style scoped>
</style>
