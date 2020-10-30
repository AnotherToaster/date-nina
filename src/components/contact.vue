<template><div class="hide"></div> </template>
<script lang="ts">
import * as API from '@/api';
import {Component, Vue} from 'vue-property-decorator';
import store from "@/store";

@Component
export default class Contact extends Vue {

	constructor() {
		super();
		this.$store.watch(
			() => {
				return this.$store.state.sendingContactForm
			}, (newValue, oldValue) => {
				if (newValue) {
					const userData = this.$store.state.userData;
                    const ContactDataArray = {userData: userData}
                    API.submitForms(ContactDataArray);
				}
			}
		)
	}
}
</script>