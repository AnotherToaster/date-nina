import Vue from 'vue'
import Vuex from 'vuex'
import ShareDialogParams = facebook.ShareDialogParams;
import ShareDialogResponse = facebook.ShareDialogResponse;

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        showVideoControls: true,
        showChoices: false,
        badEnd: false,
        goodEnd: false,
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
        currentLanguage: '',
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
        ],
        video: {
            isFullScreen: false,
            videoPosterUrl: '/img/introscreen.jpg',
            videoUrl: '',
            Id: '1',
            backFromFinish: false,
            decision: 'a',
            videoDuration: 0,
            videoCurrentTime: 100,
            videoContent: {}

        },
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
        isFullScreen(state, data) {
            state.video.isFullScreen = data;
        },

        shareBtn(state, data) {
            let shareObj: ShareDialogParams = {href: "", method: "share"};

            shareObj = {
                display: 'popup',
                method: 'share',
                href: 'https://date-nina.rum.dev/',
                quote: data
            };

            if (shareObj) {
                FB.ui(shareObj, function (response: ShareDialogResponse) {
                    console.log(response);
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
        removeInput(state, data) {
            if (state.disableBtnActive) {
                state.disableBtnActive = false;
            }
            state.counter -= 1
            state.friendsData.splice(data, 1);
        },
        setVideoId(state, data) {
            state.video.Id = data;
        },
        setVideoUrl(state, data) {
            state.video.videoUrl = data;
        },
        setVideoContent(state, data) {
            state.video.videoContent = data;
        },
        backFromFinish(state, data) {
            state.video.backFromFinish = data;
        },
        startDate(state) {
            const videoContainer: HTMLVideoElement = document.getElementById('video');
            videoContainer.poster = '';
            videoContainer.load();
            state.video.videoPosterUrl = '';
            state.video.Id = '1';
            state.video.videoUrl = 'videos/' + [state.currentLanguage] + '/step_1.mp4';
        },
        playVideo(state, data) {
            const videoContainer: HTMLVideoElement  =  document.getElementById('video');
            setTimeout(() => {
                videoContainer.pause();
            }, 150);
            state.showChoices = false;
            state.showVideoControls = false;
            state.goodEnd = false;
            state.badEnd = false;
           /* if (data && videoContainer.duration >= 10) {
                videoContainer.currentTime = (videoContainer.duration / 100) * 90;
            } else if (data) {
                videoContainer.currentTime = state.video.videoCurrentTime;
            }*/
/*
            videoContainer.playbackRate = 10;
*/
            setTimeout(() => {
                videoContainer.play();
            }, 150);
        },
        badEnd(state, data) {
            state.badEnd = data;
        },
        goodEnd(state, data) {
            state.goodEnd = data;
            if (data == true) {
                const videoContainer: HTMLVideoElement = document.getElementById('video');
                videoContainer.poster = '/img/bg_finish.png';
                videoContainer.load();
            }

        },
        showChoices(state, data) {
            state.showChoices = data;
        },
        showVideoControls(state, data) {
            state.showVideoControls = data;
        },
        setDecision(state, data) {
            state.video.decision = data;
        },
        videoDuration(state, data) {
            state.video.videoDuration = data;
        },
        videoCurrentTime(state, data) {
            state.video.videoCurrentTime = data;
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
        removeInput(context, data) {
            context.commit('removeInput', data)
        },
        currentLanguage(data) {
            data.commit('currentLanguage', data)
        },
        isFullScreen(context, data) {
            context.commit('isFullScreen', data)
        },
        shareBtn(context, data) {
            context.commit('shareBtn', data)
        },
        setVideoId(context, data) {
            context.commit('setVideoId', data)
        },
        setVideoUrl(context, data) {
            context.commit('setVideoUrl', data)
        },
        setVideoContent(context, data) {
            context.commit('setVideoContent', data)
        },
        backFromFinish(context, data) {
            context.commit('backFromFinish', data)
        },
        startDate(context, data) {
            context.commit('startDate', data)
        },
        playVideo(context, data) {
            context.commit('playVideo', data)
        },
        badEnd(context, data) {
            context.commit('badEnd', data)
        },
        goodEnd(context, data) {
            context.commit('goodEnd', data)
        },
        showVideoControls(context, data) {
            context.commit('showVideoControls', data)
        },
        showChoices(context, data) {
            context.commit('showChoices', data)
        },
        setDecision(context, data) {
            context.commit('setDecision', data)
        },
        videoDuration(context, data) {
            context.commit('videoDuration', data)
        },
        videoCurrentTime(context, data) {
            context.commit('videoCurrentTime', data)
        },
    },
    modules: {}
})
