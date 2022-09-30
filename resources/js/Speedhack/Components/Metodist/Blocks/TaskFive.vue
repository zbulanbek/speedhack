<template>
  <div>
    <template v-if="$page.props.user.role_id === '4' || active == true">
      <section class="test-wrap">
        <div class="wrap-h">
          <div class="text-test">{{ block.title }}</div>
          <template v-if="$page.props.user.role_id === '4'">
            <template v-if="block.is_show == 0">
              <button class="btn-show" :class="{'active': active}" @click="toggleText">
                <img src="/images/icons/eye-grey.svg" class="grey">
                <img src="/images/icons/eye-blue.svg" class="blue">
              </button>
            </template>
          </template>
        </div>
        <section class="test">
          <template v-for="(item, index) in questions">
            <div class="item">
              <p class="title"><b class="key"> {{ index + 1 }}. </b>{{ item.question }}</p>
              <template v-for="(i, key) in item.options">
                <div class="custom-control custom-radio"
                     :class="{'error': check_questions[index].currect == false && questions[index].answer == i, 'currect': check_questions[index].currect == true && questions[index].answer == i , 'currect_all': check_questions[index].currect == true}">
                  <input class="custom-control-input input_one" @change="change" v-model="questions[index].answer"
                         :id="item.id + '.' + key" type="radio" :name="item.id" :value="i">
                  <label class="answer_label custom-control-label" :for="item.id + '.' + key">{{ i }}</label><br>
                </div>
              </template>
            </div>
          </template>
        </section>
        <div class="btn-wrap-end">
          <button class="btn-main check" @click="checkMove">Check</button>
        </div>
      </section>
    </template>
  </div>
</template>
<script>
export default {
  props: {
    block: Object,
  },
  data() {
    return {
      questions: null,
      check_questions: null,
      active: false,
    }
  },
  mounted() {
    if (this.block.is_show == 1) {
      this.active = true;
    }

    this.questions = this.block.questions;
    this.check_questions = this.block.questions;

    for (let key in this.questions) {
      this.questions[key].currect = null;
      this.questions[key].answer = null;

      this.questions[key].options = JSON.parse(this.questions[key].options);
    }

    let vm = this;
    window.Echo.private('five-drag.' + this.block.id)
        .listen('.five.drag', function ({item}) {
          vm.questions = item.questions;
          vm.check_questions = item.check_questions;
        });

    window.Echo.private('show-topic-block.' + this.block.id)
        .listen('.show.topic.block', function ({item}) {
          vm.active = item.active;
        });
  },
  methods: {
    async checkMove(e) {
      const {data} = await window.axios.post('/test/question/five/check/metodist', {
        id: this.block.id,
        questions: this.questions
      });
      this.check_questions = data['questions'];

      let item = {
        id: this.block.id,
        questions: this.questions,
        check_questions: this.check_questions
      }

      window.axios.post('/test/question/five/drag', {item})
    },
    change() {
      console.log('ds');

      let item = {
        id: this.block.id,
        questions: this.questions,
        check_questions: this.check_questions
      }

      window.axios.post('/test/question/five/drag', {item})
    },
    toggleText() {
      this.active = !this.active;

      let item = {
        id: this.block.id,
        active: this.active,
      }
      window.axios.post('/metodist/show/topic/block', {item})

    },
  }
}
</script>
<style scoped>
.account-title {
  font-family: "Inter-Bold", sans-serif;
  padding: 30px 20px;
  font-weight: 600;
  color: #050A1C;
  font-size: 24px;
}

.account-title img {
  margin-right: 16px;
}

.bg-account {
  background: #F5F7F8;
  width: 100%;
  height: 100%;
  display: flex;
}

.content-wrap {
  width: 100%;
}

.tab-wrap {
  border-bottom: 1px solid #E0E3EB;
  display: flex;
  padding-right: 60px;
  padding-left: 60px;
  margin-bottom: 26px;
}

.tab-wrap .item {
  padding: 8px 0px;
  font-size: 18px;
  font-family: "Inter", sans-serif;
  color: rgb(123, 131, 139);
  margin-right: 40px;
  margin-bottom: -1px;
}

.tab-wrap .item.active {
  color: #003ECB;
  border-bottom: 1px solid #003ECB;
}

.text-test {
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 24px;
  color: #003ECB;
  margin-bottom: 20px;
}

.custom-radio .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #003ECB;
  border-color: #003ECB;
}

.buttons-wrap {
  display: flex;
  align-items: flex-end;
  justify-content: flex-end;
  padding-right: 60px;
  font-size: 14px;
  color: #fff;
}

.btn-prev img {
  margin-right: 10px;
}

.btn-prev {
  background-color: #F2994A;
  border-radius: 12px;
  margin-right: 24px;
  padding: 6px 20px;
  color: #fff;

}

.btn-next img {
  margin-left: 10px;
}

.btn-next {
  background-color: rgba(208, 208, 208, 0.56);
  border-radius: 12px;
  margin-left: 24px;
  padding: 6px 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 118px;
}

.test {
  margin-bottom: 60px;
}

.test .item {
  margin-bottom: 10px;
}

.title {
  font-family: "Inter", sans-serif;
  font-size: 18px;
  color: #050A1C;
}

.title .key {
  margin-right: 16px;
}

.answer_label {
  font-family: "Inter", sans-serif;
  font-size: 18px;
  color: #7B838B;
  line-height: 24px;
  margin-bottom: 12px;
}

.custom-control-input:checked ~ .custom-control-label::before {
  color: #fff;
  border-color: #3BA972;
  background-color: #3BA972;
}

.custom-control-input:checked ~ .custom-control-label {
  color: #050A1C;
}

.custom-control {
  margin-left: 15px;
}

.custom-radio.error .custom-control-label::before {
  border-color: red;
}

.custom-radio.error .custom-control-input:checked ~ .custom-control-label[data-v-644b22e2]::before {
  border-color: #3BA972;
}

.custom-radio.error .custom-control-input:checked ~ .custom-control-label::before {
  background-color: red;
  border-color: red;
}

.btn-wrap-end {
  display: flex;
  justify-content: flex-end;

  margin-bottom: 10px;
  margin-top: 20px;
}

.btn-main.check {
  padding: 12px 30px;
  font-size: 16px;
  line-height: 16px;
  background-color: #003ECB;
}

@media only screen and (max-width: 768px) {
  .tab-wrap {
    padding-right: 20px;
    padding-left: 20px;
  }

  .tab-wrap .item:last-child {
    margin: 0px;
  }

  .text-test {
    margin-right: 20px;
    margin-left: 20px;
  }

  .test {
    padding-right: 20px;
    padding-left: 20px;
  }

  .buttons-wrap {
    padding-right: 20px;
    padding-left: 20px;
    justify-content: center;
    margin-bottom: 100px;
  }

  .bg-account {
    flex-direction: column;
  }
}

.wrap-h {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.test-wrap {
  padding-left: 24px;
  padding-right: 24px;
}

.btn-show {
  background-color: transparent;
}

.btn-show .blue {
  display: none;
}

.btn-show.active .grey {
  display: none;
}

.btn-show.active .blue {
  display: block;
}

.custom-control-input:checked ~ .custom-control-label {
  background-color: transparent;
}

.custom-control.error .custom-control-label {
  color: red;
}

.custom-control.currect .custom-control-label {
  color: #4CAF50;
}

.custom-radio.currect .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #4CAF50;
  border-color: #4CAF50;
}

.custom-radio.currect_all {
  pointer-events: none;
}


</style>
