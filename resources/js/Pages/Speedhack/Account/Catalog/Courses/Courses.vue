<template>
    <account-layout>
        <section class="bg-account">
            <div class="title-page"><span>Каталог курсов</span></div>
            <div class="tab-course tab-course-account">
                <b-tabs active-nav-item-class="active-tab-nav-item">
                    <template v-for="(category,index) in categories">
                        <b-tab :active="index === 0">
                            <template #title>
                                <span class="circle"></span> {{ category.title }}
                            </template>
                            <div class="row top-40">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-4" v-for="item in category.courses">
                                    <item-course-buy :course="item"></item-course-buy>
                                </div>
                            </div>
                        </b-tab>
                    </template>

                </b-tabs>
            </div>
        </section>
    </account-layout>
</template>
<script>
import ItemCourseBuy from '@/Speedhack/Components/Details/ItemCourseBuy';

export default {
    props: {
        categories: Array,
    },
    components: {
        ItemCourseBuy,
    },
}
</script>
<style>
.bg-account {
    background: #F5F7F8;
    width: calc(100% - 320px);
    width: auto;
    height: 100%;
}

.title-page {
    padding: 30px 60px;
}

.title-page span {
    font-size: 24px;
    font-family: "Inter-Bold", sans-serif;
    color: #050A1C;
}

.tab-course-account .tab-content {
    margin-left: 60px;
    margin-right: 60px;
}

.tab-wrap {
    border-bottom: 1px solid #E0E3EB;
    display: flex;
    padding-right: 60px;
    padding-left: 60px;
    margin-bottom: 46px;
}

.tab-wrap .item {
    padding: 8px 0px;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    color: rgb(123, 131, 139);
    margin-right: 40px;
    margin-bottom: -1px;
}

.title-center {
    text-align: center;
    font-family: 'Inter', sans-serif;
    font-weight: bold;
    font-size: 50px;
    line-height: 78px;
    color: #050A1C;
}

.wrap-center {
    display: flex;
    justify-content: center;
    margin-top: 80px;
}

.circle {
    display: block;
    width: 8px;
    height: 8px;
    background-color: #A339FF;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 8px;
}

.top-40 {
    margin-top: 40px;
}

.tab-course-account .nav-tabs .nav-link {
    display: flex;
    justify-content: left;
    align-items: center;
}

.tab-course-account .nav-tabs .nav-link.active, .tab-course-account .nav-tabs .nav-item.show .nav-link {
    background-color: transparent;
}

@media only screen and (max-width: 768px) {
    .tab-course-account {
        margin-left: 20px;
        margin-right: 20px;
    }

    .title-page {
        padding: 30px 20px;
    }

    .tab-course-account .nav-tabs .nav-link {
        margin-right: 4px;
        font-size: 12px;
    }

     .tab-course-account .tab-content{
        margin-left: 0px;
        margin-right: 0px
    }
}
</style>
