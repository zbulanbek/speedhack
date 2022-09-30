<template>
    <account-layout>
        <section class="bg-account">
            <div class="account-title">
                <div class="wrap-text">
                    <a :href="route('webinars.index')"><img src="/images/icons/arrow-left-blue.svg"></a>
                    <span>{{webinar.name}}</span>
                </div>

            </div>

            <div class="webinar">
                <div class="webinar_info">
                    <div class="content-wrap">
                        <span class="title"><b>Название курса: </b></span>
                        <p>{{webinar.course.title}}</p>
                    </div>

                    <div class="content-wrap">
                        <span class="title"><b>Выступающий: </b></span>
                        <p>{{ webinar.owner.name }} {{webinar.owner.surname}}</p>
                    </div>
                </div>


                <section class="video-wrap">
                    <section class="lesson-wrap">
                        <video-webinar :owner="webinar.owner" :room_name="room_name" :access_token="access_token"></video-webinar>

                        <div class="video-items">
                            <span class="count-users">Участники: 2</span>
                            <button class="btn-main btn-copy" @click="copyLink">Скопировать ссылку на вебинар </button>  
                            <input id="currentUrl" type="text">
                        </div>
                    </section>

                    <section class="comment-wrap">
                        <ul class="list_comment">
                            <template v-for="comment in comments">
                                <li class="box_result">
                                    <div class="avatar_comment">
                                        <img :src="comment.authorImg" alt="avatar"/>
                                    </div>
                                    <div class="result_comment">
                                        <h4>{{ comment.author }}</h4>
                                        <p>{{ comment.text }}</p>
                                    </div>
                                </li>
                            </template>
                        </ul>

                        <div class="wrap-comment-textarea">
                            <div class="avatar_comment">
                              <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                            </div>
                            <div class="box_comment">
                                <textarea class="commentar" placeholder="Добавить комментарий..." v-model="newComment"></textarea>
                                <div class="box_post">
                                    <div class="pull-right">
                                        <button type="button" @click="addComment">Отправить</button>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </section>
                </section>
                
           

            </div>
        </section>
    </account-layout>
</template>

<script>
export default {
    name: "Webinar",
    props: {
        webinar: Object,
        room_name: String,
        access_token: String,
    },
    data() {
        return {
            newComment: '',
            comments: [
                {
                    text: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s.',
                    author: 'Nath Ryuzaki',
                    authorImg:
                      'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg'
                },

                {
                    text: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    author: 'Miriam',
                    authorImg:
                      'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg'
                },
                {
                    text: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
                    author: 'Brandon Smith',
                    authorImg:
                      'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg'
                },

                {
                    text: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    author: 'James Parsons',
                    authorImg:
                      'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg'
                },
                
            ],
        }
    },
    mounted() {
        document.getElementById("currentUrl").value = window.location.href;
    },
     methods: {
        copyLink() {
            let url = document.getElementById("currentUrl");
            url.select();    
            document.execCommand("copy");
        },

        addComment: function() {
            const newCommentObj = {
                text: this.newComment,
                author: 'Zhansaya Bulanbek',
                authorImg:'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg'
            }
          this.comments.push(newCommentObj);
          this.newComment = '';
        }
    }
}
</script>

<style scoped>
.webinar {
    width: 90%;
    margin: 25px auto;
}
.webinar_info {
    display: flex;
}

.content-wrap {
    display: flex;
}

.content-wrap p{
    margin-left: 10px;
}

.video-wrap{
    display: flex;
}

.video-items{
    display: flex;
    justify-content: space-between;
    margin-top: 26px;
    align-content: flex-end;
}


.count-users{
    font-family: "Inter", sans-serif;
    font-size: 18px;
    color: #7B838B;
    margin-top: auto;
}
.lesson-wrap{
    width: 60%;
    padding-right: 8px;
}
.comment-wrap{
    width: 40%;
    padding-left: 8px;
}

.btn-copy{
    padding: 10px 16px;
    font-size: 15px;
    line-height: 14px;
}

/*Comment*/

#currentUrl{
    opacity: 0;
    position: absolute;
    pointer-events: none;
}
.list_comment{
    overflow: auto;
    max-height: 500px;
    border-bottom: 1px solid #dddfe2;
    padding-bottom: 16px;
}
.comment-wrap{
    background:#fff;
    border: 1px solid #dddfe2;
    border-radius: 3px;
    color: #4b4f56;
    padding: 16px;
    height: max-content;
    border-radius: 5px;
}

.avatar_comment{
    display: block;
    min-width: 45px;
    height: 45px;
    border-radius: 50%;
    overflow: hidden;
}
.avatar_comment img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.box_comment{
    display: block;
    position: relative;
    line-height: 1.358;
    word-break: break-word;
    border: 1px solid #d3d6db;
    word-wrap: break-word;
    background: #fff;
    box-sizing: border-box;
    cursor: text;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 16px;
    padding: 0;
    width: 100%;
    margin-left: 10px;
    border-radius: 5px;
    overflow: hidden;
}
.box_comment textarea{
    min-height: 40px;
    padding: 12px 8px;
    width: 100%;
    border: none;
    resize: none;
}
.box_comment textarea:focus{
  outline: none !important;
}
.box_comment .box_post{
    border-top: 1px solid #d3d6db;
    background: #f5f6f7;
    padding: 8px;
    display: block;
    overflow: hidden;
    display: flex;
    justify-content: flex-end;
}
.box_comment label{
  display: inline-block;
  vertical-align: middle;
  font-size: 11px;
  color: #90949c;
  line-height: 22px;
}
.box_comment button{
  margin-left:8px;
  background-color: #4267b2;
  border: 1px solid #4267b2;
  color: #fff;
  text-decoration: none;
  line-height: 22px;
  border-radius: 2px;
  font-size: 14px;
  font-weight: bold;
  position: relative;
  text-align: center;
}
.box_comment button:hover{
  background-color: #29487d;
  border-color: #29487d;
}

.box_comment img{
  height:16px;
  width:16px;
}
.box_result{
  margin-top: 24px;
  display: flex;
}
.box_result .result_comment h4{
  font-weight: 600;
  white-space: nowrap;
  color: #365899;
  cursor: pointer;
  text-decoration: none;
  font-size: 14px;
  line-height: 1.358;
  margin:0;
}
.box_result .result_comment{
  display:block;
  overflow:hidden;
  padding: 0;
  padding-left: 10px;
}
.child_replay{
    border-left: 1px dotted #d3d6db;
    margin-top: 12px;
    list-style: none;
    padding:0 0 0 8px
}
.reply_comment{
    margin:12px 0;
}
.box_result .result_comment p{
    margin: 4px 0;
    text-align:justify;
    font-size: 14px;
}
.box_result .result_comment .tools_comment{
  font-size: 12px;
  line-height: 1.358;
}
.box_result .result_comment .tools_comment a{
  color: #4267b2;
  cursor: pointer;
  text-decoration: none;
}
.box_result .result_comment .tools_comment span{
  color: #90949c;
}

.wrap-comment-textarea{
    display: flex;
}

@media only screen and (max-width: 768px) {
    .video-items{
        margin-bottom: 20px;
    }
    .video-wrap{
    flex-direction: column;
    }

    .lesson-wrap{
        width: 100%;
        padding-right: 0px;
    }
    .comment-wrap{
        width: 100%;
    }

}
</style>
