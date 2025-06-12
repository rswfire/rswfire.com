<template>
    <div class="relative w-full pt-[56.25%]">
        <div :id="playerId" class="absolute top-0 left-0 w-full h-full"></div>
    </div>
</template>

<script setup>
import { onMounted, onBeforeUnmount } from 'vue';
import { useYouTubeApi } from '../useYoutubeApi.ts';
import { nanoid } from 'nanoid';

const props = defineProps({
    videoId: {
        type: String,
        required: true,
    },
});

const playerId = `youtube-player-${nanoid(8)}`;
let player = null;

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
