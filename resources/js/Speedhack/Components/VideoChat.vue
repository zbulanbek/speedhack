<template>
    <div class="video-chat-wrap">
        <div id="video-chat-window"></div>
       <!--  <div id="video-preview" class="fixed bg-gray-600 bottom-0 right-0 w-1/3 lg:w-1/5 mr-5 mb-5 sm:mr-10 sm:mb-10 overflow-hidden rounded-md shadow-xl">
        </div> -->
        <div class="toggle-btn-wrap">
            <button class="audio-toggle-btn" @click="toggleAudio">
                <template v-if="audio">
                    <img src="/images/icons/microphone_on.svg" class="on">
                </template>
                <template v-else>
                    <img src="/images/icons/microphone_off.svg">
                </template>
            </button>


            <button class="audio-toggle-btn video" @click="toggleVideo">
                <template v-if="video">
                    <img src="/images/icons/no-video.svg">
                </template>
                <template v-else>
                    <img src="/images/icons/video-player.svg">
                </template>
            </button>
        </div>

    </div>
</template>

<script>
import { connect, createLocalVideoTrack } from 'twilio-video';
export default {
    props: {
        room_name: String,
        accessToken: String,
    },
    name: 'video-chat',
    data() {
        return {
            audio: true,
            video: true,
        }
    },
    mounted() {
        this.connectToRoom()
    },
    methods: {
        toggleAudio(){
            if(this.audio){
                this.audio = !this.audio;
                window.room.localParticipant.audioTracks.forEach((publication) => {
                    publication.track.disable();
                });
            }else{
                this.audio = !this.audio;
                window.room.localParticipant.audioTracks.forEach((publication) => {
                    publication.track.enable();
                });
            }
        },
        toggleVideo(){
            if(this.video){
                this.video = !this.video;
                window.room.localParticipant.videoTracks.forEach((publication) => {
                    publication.track.disable();
                });
            }else{
                this.video = !this.video;
                window.room.localParticipant.videoTracks.forEach((publication) => {
                    publication.track.enable();
                });
            }
        },
        async connectToRoom() {
            const _this = this

            // Join to the Room with the given AccessToken and ConnectOptions.
            const room = await connect(this.accessToken, { audio: true, video: { width: 1920, height: 1080 } });

            // Make the Room available in the JavaScript console for debugging.
            window.room = room;
            this.addLocalParticipant(room.localParticipant)
            // Subscribe to the media published by RemoteParticipants already in the Room.
            room.participants.forEach(participant => this.addRemoteParticipant(participant));
            room.on('participantConnected', participant => this.addRemoteParticipant(participant));
        },
        addLocalParticipant(participant) {

            // Create the video container
            this.createVideoContainer(participant)
            // Attach the
            participant.tracks.forEach(publication => {
                if ('audio' == publication.kind)
                    return
                this.publishTrack(publication.track, participant)
            })
        },
        addRemoteParticipant(participant) {
             console.log(`Participant "${participant.identity}" connected`);

            this.createVideoContainer(participant)
            // Set up listener to monitor when a track is published and ready for use
            participant.on('trackSubscribed', track => {
                this.publishTrack(track, participant);
            });
        },
        createVideoContainer(participant) {
            // Add a container for the Participant's media.

            const div = document.createElement('div');
            div.id = participant.sid;
            div.classList.add("video-block");
            document.getElementById('video-chat-window').appendChild(div);


        },
        publishTrack: ( track, participant ) => {
            const videoContainer = document.getElementById(participant.sid);
            videoContainer.appendChild(track.attach())
        }
    },
}
</script>
<style scoped>
    .audio-toggle-btn{
        border-radius: 50%;
        overflow: hidden;
        width: 55px;
        height: 55px;
        background-color: rgba(0, 0, 0, .5);
        margin-right: 10px;
    }

    .audio-toggle-btn img{
        width: 65%;
        height: 65%;
        object-fit: contain;
    }

    .audio-toggle-btn img.on{
        margin-right: -10px;
    }

    .video-chat-wrap{
        position: relative;
    }

    .audio-toggle-btn.video{
        margin-left: 10px;
        margin-right: 0px;
    }
    .toggle-btn-wrap{
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        align-items: center;
        z-index: 5;
    }

    .video-chat-wrap{
        padding-right: 16px;
    }

    @media only screen and (max-width: 768px) {
        .audio-toggle-btn{
            height: 45px;
            width: 45px;
        }
        .video-chat-wrap div{
            padding-right: 0px;
            padding-left: 0px;
        }
    }
</style>
