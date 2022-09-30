<template>
    <div class="pages">
        <a href="#" class="pages__prev" @click.prevent="changePage(pagination.current_page - 1)" v-if="pagination.current_page >= 2">
            Предыдущая
        </a>
        <template v-for="(page, index) in pages">
            <a
                v-if="index <= offset"
                class="pages__page"
                href="#"
                :class="isCurrentPage(page) ? 'active' : ''"
                :key="'page-'+index"
                @click.prevent="changePage(page)"
            >
                {{ page }}
            </a>
        </template>

        <a href="#" class="pages__link next" @click.prevent="changePage(pagination.current_page + 1)" v-if="pagination.current_page !== pagination.last_page">
            Следующая
        </a>

    </div>

</template>

<script>
export default {
    props: ['pagination', 'offset'],
    methods: {
        isCurrentPage(page) {
            return this.pagination.current_page === page;
        },
        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.$emit('paginate');
            
        },
    },
    computed: {
        pages() {
            const pages = [];
            let from = this.pagination.current_page - Math.floor(this.offset / 2);
            if (from < 1) {
                from = 1;
            }

            let to = from + this.offset - 1;
            if (to > this.pagination.last_page) {
                to = this.pagination.last_page;
            }

            while (from <= to) {
                pages.push(from);
                from += 1;
            }

            return pages;
        },
    },
}
</script>
<style scoped>
    .pages{
        display: flex;
        justify-content: flex-end;
    }
    .pages__page{
        color:  #003ECB;
    }
    .pages__page:hover{
        background-color: #003ECB;
        color: #fff;
    }
    .pages__page.active{
        color:  #fff;
        background-color: #003ECB;
    }
    .pages__prev:hover, .pages__next:hover{
        background-color: #003ECB;
        color: #fff;
    }
    .pages__prev, .pages__next{
        color:  #003ECB;
    }
</style>
