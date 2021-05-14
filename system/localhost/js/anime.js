// let runAnimate = {
//     from: 0,
//     to: 250,
//     animate: function($target) {
//         anime({
//             targets: $target,
//             translateX: [this.from, this.to],
//             direction: 'alternate',
//             easing: 'easeInOutSine'
//         });
//         return 'animation...' + this.from + ' - ' + this.to;
//     }
// }
function runAnimate($from, $to) {
    this.from = $from;
    this.to = $to;
    this.count = 0;

    this.animate = function($target) {

        anime({
            targets: $target,
            translateX: [this.from, this.to],
            direction: 'alternate',
            easing: 'easeInOutSine'
        });
        console.log('animation...' + this.from + ' - ' + this.to);

        this.count++;

        return this.count;

    }
}