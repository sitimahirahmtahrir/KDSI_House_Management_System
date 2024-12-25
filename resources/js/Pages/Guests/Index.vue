<template>
    <AppLayout>
        <GuestManagement :guests="guests" />
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import GuestManagement from '@/Components/GuestManagement.vue';

export default {
    components: { GuestManagement, AppLayout },
    props: {
        guests: Array,
    },
};
</script>
