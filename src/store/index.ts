import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        showVideoControls: true,
        videoUrl: 'videos/de/step_1.mp4',
        videoPosterUrl: '/img/introscreen.jpg',
        showChoices: false,
        isEnd: false,
        isFinish: false,
        currentVideoIdStore: 1,
        showInfoModal: false,
        showImprintModal: false,
        showPrivacyModal: false,
        showContactModal: false,
        sentContactForm: false,
        sentContactFormError: false,
        sendingContactForm: false,
        showThanks: false,
        disableBtnActive: false,
        maxFieldNumber: 5,
        counter: 1,
        showContactSuccess: false,
        currentLanguage: 'de',
        switchLang: false,
        isFS: false,
        siteData: [],
        userData: {
            clientName: '',
            clientEmail: '',

        },
        friendsData: [
            {
                id: 1,
                friendName: '',
                friendEmail: '',
            }
        ]
    },
    mutations: {
        siteContent(state, data) {
            state.siteData = data;
        },
        showInfoModal(state, data) {
            state.showInfoModal = data;
        },
        showImprintModal(state, data) {
            state.showImprintModal = data;
        },
        showPrivacyModal(state, data) {
            state.showPrivacyModal = data;
        },
        showContactModal(state, data) {
            state.showContactModal = data;
        },
        setContactFormData(state, data) {
            state.userData = data;
        },
        sentContactForm(state, data) {
            state.sentContactForm = data;
        },
        sentContactFormError(state, data) {
            state.sentContactFormError = data;
        },
        sendingContactForm(state, data) {
            state.sendingContactForm = data;
        },
        showThanks(state, data) {
            state.showThanks = data;
        },
        showContactSuccess(state, data) {
            state.showContactSuccess = data;
        },
        currentLanguage(state, data) {
            state.currentLanguage = data;
        },
        switchLang(state, data) {
            state.currentLanguage = data;
        },
        isFS(state, data) {
            state.isFS = data;
        },
        shareBtn(state) {
            if (state.currentVideoIdStore == 1) {
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: 'https://date-nina.rum.dev/',
                    quote: 'Date Nina! Kann ich nur empfehlen!'
                }, function (response: string) {
                    //
                });
            } else if (state.currentVideoIdStore == 5) {
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: 'https://date-nina.rum.dev/',
                    quote: 'Ich wurde beim Rasen erwischt! Und das beim Date mit Nina... :( Vielleicht machst du es ja besser?'
                }, function (response: string) {
                    //
                });
            } else if (state.currentVideoIdStore == 7) {
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: 'https://date-nina.rum.dev/',
                    quote: 'Ich habe das Date mit Nina versaut... Schade! Vielleicht machst du es besser?'
                }, function (response: string) {
                    //
                });
            } else if (state.currentVideoIdStore == 8) {
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: 'https://date-nina.rum.dev/',
                    quote: 'Ich las ein SMS beim Autofahren! Vielleicht machst du es besser?'
                }, function (response: string) {
                    //
                });
            } else if (state.isEnd) {
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: 'https://date-nina.rum.dev/',
                    quote: 'Ich bin betrunken Auto gefahren! Vielleicht machst du es besser?'
                }, function (response: string) {
                    //
                });
            } else if (state.isFinish) {
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: 'https://date-nina.rum.dev/',
                    quote: 'Ich habe Nina erfolgreich durch ein Date geführt... Hast du auch Lust?'
                }, function (response: string) {
                    //
                });
            }

        },
        addInput(state) {
            state.counter += 1
            if (state.counter <= state.maxFieldNumber) {
                if (state.counter == state.maxFieldNumber) {
                    state.disableBtnActive = true;
                }
                const item = {
                    id: state.counter,
                    friendName: '',
                    friendEmail: '',
                };
                state.friendsData.push(item);
            }
        },
        removeInput(state) {
            if (state.disableBtnActive) {
                state.disableBtnActive = false;
            }
            state.counter -= 1
            state.friendsData.pop()
        },
        currentVideoIdStore(state) {
            state.currentVideoIdStore ++;
        },
    },
    actions: {
        siteContent(context, data) {
            context.commit('siteContent', data);
        },
        showInfoModal(context, data) {
            context.commit('showInfoModal', data)
        },
        showImprintModal(context, data) {
            context.commit('showImprintModal', data)
        },
        showPrivacyModal(context, data) {
            context.commit('showPrivacyModal', data)
        },
        showContactModal(context, data) {
            context.commit('showContactModal', data)
        },
        setContactFormData(context, data) {
            context.commit('setContactFormData', data);
        },
        sentContactForm(context, data) {
            context.commit('sentContactForm', data);
        },
        sentContactFormError(context, data) {
            context.commit('sentContactFormError', data);
        },
        sendingContactForm(context, data) {
            context.commit('sendingContactForm', data);
        },
        showThanks(context, data) {
            context.commit('showThanks', data);
        },
        showContactSuccess(context, data) {
            context.commit('showContactSuccess', data)
        },
        addInput(data) {
            data.commit('addInput', data)
        },
        removeInput(data) {
            data.commit('removeInput', data)
        },
        currentLanguage(data) {
            data.commit('currentLanguage', data)
        },
        switchLang(context, lang) {
            context.commit('switchLang', lang)
        },
        isFS(context, data) {
            context.commit('isFS', data)
        },
        shareBtn(context, data) {
            context.commit('shareBtn', data)
        },
        currentVideoIdStore(context, data) {
            context.commit('currentVideoIdStore', data)
        },
    },
    modules: {}
})
