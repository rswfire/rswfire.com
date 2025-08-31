export function useCopySectionLink() {
    async function copySectionLink(anchorId) {
        const id = anchorId?.startsWith('#') ? anchorId.slice(1) : anchorId;
        const url = new URL(window.location.href);
        url.hash = id || '';

        try {
            await navigator.clipboard.writeText(url.toString());
            return true;
        } catch {
            // fallback
            const ta = document.createElement('textarea');
            ta.value = url.toString();
            ta.setAttribute('readonly', '');
            ta.style.position = 'absolute';
            ta.style.left = '-9999px';
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
            return false;
        }
    }
    return { copySectionLink };
}
