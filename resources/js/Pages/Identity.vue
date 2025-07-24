<template>
    <div class="footer-block">
        <div class="line name">ROBERT SAMUEL WHITE</div>
        <div class="line site">RSWFIRE.COM</div>
        <div class="line keywords">SYSTEMS DESIGN · ETHICAL TECH · FIELD ARCHITECTURE</div>
    </div>
</template>

<style scoped>
.footer-block {
    background-color: #111;
    padding: 1.5rem 1rem;
    font-family: 'Inter', sans-serif;
    color: #ccc;
    line-height: 1.5;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.35);
    width: 100%;
}

.line {
    margin: 0.25rem 0;
    letter-spacing: 0.05em;
}

.name {
    font-size: 1.5rem;
    font-weight: 700;
    color: #fff;
    text-transform: uppercase;
}

.site {
    font-size: 1.1rem;
    font-weight: 500;
    color: #aaa;
}

.keywords {
    font-size: 1rem;
    font-style: italic;
    color: #bbb;
}
</style>



<script setup>
defineOptions({ layout: null });
</script>
