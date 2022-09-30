<template>
    <div>
        <template v-if="block.type !== 'read'">
            <keep-alive>
                <component
                    :is="block.type"
                    :block="block"
                    :index="index">
                </component>
            </keep-alive>
        </template>
        <template v-else>
            <read
                :block="block"
                :index="index">
            </read>
        </template>
    </div>
</template>
<script>
import one from '@/Speedhack/Components/Metodist/Blocks/TaskOne';
import two from '@/Speedhack/Components/Metodist/Test/TaskTwo';
import three from '@/Speedhack/Components/Metodist/Blocks/TaskThree';
import four from '@/Speedhack/Components/Metodist/Blocks/TaskFour';
import five from '@/Speedhack/Components/Metodist/Blocks/TaskFive';
import read from '@/Speedhack/Components/Metodist/ShowText';

export default {
    props: {
        block: Object,
        index: Number
    },
    components: {
        one,
        two,
        three,
        read,
        four,
        five
    },
}
</script>
