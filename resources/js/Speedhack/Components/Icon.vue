<template>
    <component :is="iconName"></component>
</template>

<script>

import ReadIcon from "@/Speedhack/Icons/ReadIcon";
import AudioIcon from "@/Speedhack/Icons/AudioIcon";
import VideoIcon from "@/Speedhack/Icons/VideoIcon";
import Check from "@/Speedhack/Icons/Check";
import ArrowLeftBlue from "@/Speedhack/Icons/ArrowLeftBlue";
import SuccessCheck from "@/Speedhack/Icons/SuccessCheck";

export default {
    name: "icon",
    props: {
        iconName: {
            type: String,
            required: true
        }
    },
    components: {
        ReadIcon,
        AudioIcon,
        VideoIcon,
        Check,
        ArrowLeftBlue,
        SuccessCheck,
    }
}
</script>

<style scoped>

</style>
