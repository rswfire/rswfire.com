<template>

    <div :class="aspectClass">
        <div :id="playerId" class="absolute top-0 left-0 w-full h-full"></div>
    </div>

</template>

<script setup>
import { onMounted, onBeforeUnmount, computed } from 'vue';
import { useYouTubeApi } from '../useYoutubeApi.ts';
import { nanoid } from 'nanoid';

const props = defineProps({
    videoId: {
        type: String,
        required: true,
    },
    isPortrait: {
        type: Boolean,
        default: false,
    },
});

const playerId = `youtube-player-${nanoid(8)}`;
let player = null;

const aspectClass = computed(() =>
    props.isPortrait
        ? 'relative w-full max-w-[400px] mx-auto aspect-[9/16] max-h-[700px]'
        : 'relative w-full aspect-[16/9]'
);

onMounted(async () => {
    await useYouTubeApi();
    player = new window.YT.Player(playerId, {
        videoId: props.videoId,
        playerVars: {
            modestbranding: 1,
            rel: 0,
            enablejsapi: 1,
        },
    });
});

onBeforeUnmount(() => {
    if (player?.destroy) player.destroy();
});
</script>
