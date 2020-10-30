import axios from 'axios';
import store from '@/store'

export function submitForms(formDataArray: any) {
	axios.post('/submit.php', {'data': formDataArray})
		.then((response) => {
			store.commit('sentContactForm', {success: response.data.success});
		})
		.catch((error) => {
			store.commit('sentContactForm', {success: false});
			store.commit('sentContactFormError', true);
		})

}
