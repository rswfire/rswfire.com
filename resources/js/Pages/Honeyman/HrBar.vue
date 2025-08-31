<template>
  <div class="relative my-6">
    <div class="-mx-6 md:-mx-8">
      <span :id="id" class="toc-anchor" aria-hidden="true"></span>
      <hr class="h-[3px] bg-honeyman-300 border-0 rounded my-10" />
    </div>
  </div>
</template>

<script setup>
  defineProps({ id: String })
</script>

<style scoped>
/* Mobile: header ≈92px; give extra breathing room */
.toc-anchor {
  position: relative;
  display: block;
  height: 0;            /* no layout impact */
  top: -120px;          /* move anchor 120px *up* so scroll lands lower */
}

/* Desktop: header ≈125px; a bit more room */
@media (min-width: 768px) {
  .toc-anchor { top: -160px; }
}
</style>
