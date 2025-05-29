let apiReady = false;
let apiReadyPromise = null;

export function useYouTubeApi() {
    if (apiReady) return Promise.resolve();

    if (!apiReadyPromise) {
        apiReadyPromise = new Promise((resolve) => {
            if (window.YT && window.YT.Player) {
                apiReady = true;
                resolve();
                return;
            }

            // Only assign once
            window.onYouTubeIframeAPIReady = () => {
                apiReady = true;
                resolve();
            };

            const tag = document.createElement("script");
            tag.src = "https://www.youtube.com/iframe_api";
            document.head.appendChild(tag);
        });
    }

    return apiReadyPromise;
}
