<template>
    <div>
        <div class="video-chat-wrap" id="root_app">
            <div id="video-webinar" class="mb-3"></div>

            <div class="row justify-content-center">
                <div class="toggle-btn-wrap" v-if="$page.props.user.id === owner.id">
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

                    <button id="share_screen" class="audio-toggle-btn video" @click="shareScreenHandler">
                        <template v-if="share">
                            <img src="/images/icons/audio_pause_button.svg">
                        </template>
                        <template v-else>
                            <img src="/images/icons/play_button.svg">
                        </template>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {connect, LocalVideoTrack, createLocalVideoTrack} from 'twilio-video';

export default {
    props: {
        owner: Object,
        room_name: String,
        access_token: String,
    },
    name: 'video-chat',
    data() {
        return {
            audio: true,
            video: true,
            share: false,
            screenTrack: null,
            divId: '',
            sharedDivId: '',
        }
    },
    async mounted() {
        if (this.access_token) {
            this.connectToRoom(this.access_token)
        } else {
            const {token} = await this.generateAccessToken();
            this.connectToRoom(token)
        }

    },
    methods: {
        toggleAudio() {
            if (this.audio) {
                this.audio = !this.audio;
                window.room.localParticipant.audioTracks.forEach((publication) => {
                    publication.track.disable();
                });
            } else {
                this.audio = !this.audio;
                window.room.localParticipant.audioTracks.forEach((publication) => {
                    publication.track.enable();
                });
            }
        },
        toggleVideo() {
            if (this.video) {
                this.video = !this.video;
                window.room.localParticipant.videoTracks.forEach((publication) => {
                    publication.track.disable();
                });
            } else {
                this.video = !this.video;
                window.room.localParticipant.videoTracks.forEach((publication) => {
                    publication.track.enable();
                });
            }
        },
        async shareScreenHandler() {
            this.share = !this.share
            if (this.share) {
                const stream = await navigator.mediaDevices.getDisplayMedia();
                this.screenTrack = new LocalVideoTrack(stream.getTracks()[0]);
                this.screenTrack.once('stopped', () => {
                    room.localParticipant.unpublishTrack(this.screenTrack);
                    var sharedDiv = document.getElementById(this.sharedDivId);

                    sharedDiv.remove()
                    this.addLocalParticipant(room.localParticipant)
                    this.share = !this.share
                    window.room.participants.forEach(participant => this.addRemoteParticipant(participant));
                });

                await room.localParticipant.publishTrack(this.screenTrack);
                this.addLocalShareParticipant(room.localParticipant)

                // this.addRemoteParticipant(room.localParticipant)
                var Div = document.getElementById(this.divId);
                Div.remove()
                var sharedDiv = document.getElementById(this.sharedDivId);
                // window.room.on('trackAdded', participant => this.addRemoteParticipant(participant));
            } else {
                room.localParticipant.unpublishTrack(this.screenTrack);
                var sharedDiv = document.getElementById(this.sharedDivId);
                sharedDiv.remove()
                this.addLocalParticipant(room.localParticipant)
                this.screenTrack.stop();
                this.screenTrack = null;
            }
        },

        async generateAccessToken() {
            const {data} = await axios.get(route('twilio-video.generate-token'), {
                params: {
                    room_name: this.room_name
                }
            });
            return data;
        },

        async connectToRoom(access_token) {
            const room = await connect(access_token, { audio: true, video: { width: 340, height: 340} });

            window.room = room;
            // Subscribe to the media published by RemoteParticipants already in the Room.
            if (this.$page.props.user.id === this.owner.id) {
                this.addLocalParticipant(room.localParticipant)
            } else {
                room.participants.forEach(participant => this.addRemoteParticipant(participant));
                room.on('participantConnected', participant => this.addRemoteParticipant(participant));
            }

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
        addLocalShareParticipant(participant) {

            // Create the video container
            this.createVideoShareContainer(participant)
            // Attach the
            participant.tracks.forEach(publication => {
                if ('audio' == publication.kind)
                    return
                this.publishShareTrack(publication.track, participant)
            })
        },
        addRemoteParticipant(participant) {
            console.log(`Participant "${participant.identity}" connected`);

                this.createVideoShareContainer(participant)
                // Set up listener to monitor when a track is published and ready for use
                participant.on('trackSubscribed', track => {
                    this.publishShareTrack(track, participant)
                });

        },
        createVideoContainer(participant) {
            // Add a container for the Participant's media.

            const div = document.createElement('div');
            this.divId = participant.sid
            div.id = this.divId;
            div.classList.add("video-block");
            document.getElementById('video-webinar').appendChild(div);
        },
        createVideoShareContainer(participant) {
            // Add a container for the Participant's media.
            const div = document.createElement('div');
            this.sharedDivId = participant.sid+'share'
            div.id = this.sharedDivId;
            div.classList.add("video-share-block");
            document.getElementById('video-webinar').appendChild(div);
        },
        publishTrack( track, participant ) {
            const videoContainer = document.getElementById(this.divId);
            videoContainer.appendChild(track.attach())
        },
        publishShareTrack( track, participant ) {
            const videoContainer = document.getElementById(participant.sid+'share');
            const videoShare = videoContainer.appendChild(track.attach())
        }

    },
}
</script>
<style>
.audio-toggle-btn {
    border-radius: 50%;
    overflow: hidden;
    width: 55px;
    height: 55px;
    background-color: rgba(0, 0, 0, .5);
    margin-right: 10px;
}

.audio-toggle-btn img {
    width: 65%;
    height: 65%;
    object-fit: contain;
}

.audio-toggle-btn img.on {
    margin-right: -10px;
}

.video-chat-wrap {
    position: relative;
}

.audio-toggle-btn.video {
    margin-left: 10px;
    margin-right: 10px;
}

.toggle-btn-wrap {
    display: flex;
    align-items: center;
    z-index: 5;
}

#video-webinar {
    position: relative;
    width: 100%;
    height: 600px;
    overflow: hidden;
}

#video-webinar .video-block:not(:first-child) {
    background-color: black;
    width: 100%;
    height: 100%;
    border-radius: 8px;
    overflow: hidden;
    position: absolute;
    top: 0px;
    right: 0px;
    display: flex;
    justify-content: center;
    max-height: 100%;
    max-width: 100%;
}

#video-webinar .video-block:not(:first-child) video {
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    -o-object-position: top;
    object-position: top;
}

#video-webinar .video-block {
    transform: scaleX(-1);
}

#video-webinar .video-block:first-child {
   position: absolute;
   bottom: 0px;
 right: 0px;
    overflow: hidden;
    border-radius: 8px;
    width: 100%;
    height: 100%;
    background-color: black;
    z-index: 5;
}

#video-webinar .video-block:first-child video {
   width: 100%;
   height: 100%;
   -o-object-fit: cover;
   object-fit: cover;
   -o-object-position: center;
   object-position: center;
}

.video-share-block:first-child video {
    z-index: 3;
    position: absolute;
}

.video-share-block video:last-child {
    position: absolute;
    width: 100% !important;
    height: 100%;
    z-index: 1;
    -o-object-fit: cover;
   object-fit: cover;
   -o-object-position: center;
   object-position: center;
}

</style>
