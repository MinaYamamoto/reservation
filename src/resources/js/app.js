import StarRating from 'vue-star-rating'
Vue.component('star-rating', StarRating);
const app = new Vue({
    el: '#review__star_' + reservationId,
    components: {
        StarRating,
    },
    data: {
        rating: 0
    }
});

Vue.component('star-rating', StarRating);
var star = document.getElementById('js-review-correction__star').getAttribute('data-integer-value');
const review = new Vue({
    el: '#review-correction__star',
    components: {
        StarRating,
    },
    data: {
        rating: star
    }
});
