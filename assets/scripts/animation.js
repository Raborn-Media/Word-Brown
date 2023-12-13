import { gsap } from 'gsap';

import { ScrollTrigger } from 'gsap/ScrollTrigger';

if ($('#culture').length) {
  gsap.registerPlugin(ScrollTrigger);

  /**
   * Words wrap animations
   */
  let tlTopWords = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.top-words-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });

  tlTopWords.from('.top-words-wrap', {
    y: 100,
    scrollTrigger: {
      trigger: '.top-words-container',
      start: 'top 110%',
      end: 'top 40%',
      // diration: 2,
      scrub: true,
    },
  });
  tlTopWords.to('.top-words-wrap .dynamic', {
    y: -110,
    scrollTrigger: {
      trigger: '.top-words-container',
      start: 'top 65%',
      end: 'top 20%',
      // diration: 2,
      scrub: true,
    },
  });
  let tlMobileTopWords = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mobile-top-words-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });

  tlMobileTopWords.from('.mobile-top-words-wrap', {
    y: 100,
    scrollTrigger: {
      trigger: '.mobile-top-words-container',
      start: 'top 110%',
      end: 'top 40%',
      // diration: 2,
      scrub: true,
    },
  });
  tlMobileTopWords.to('.mobile-top-words-wrap .dynamic', {
    y: -110,
    scrollTrigger: {
      trigger: '.mobile-top-words-container',
      start: 'top 65%',
      end: 'top 20%',
      // diration: 2,
      scrub: true,
    },
  });
  let tlMidWords = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mid-words-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });

  tlMidWords.from('.mid-words-wrap', {
    y: 100,
    scrollTrigger: {
      trigger: '.mid-words-container',
      start: 'top 110%',
      end: 'top 40%',
      // diration: 2,
      scrub: true,
    },
  });
  tlMidWords.to('.mid-words-wrap .dynamic', {
    y: -110,
    scrollTrigger: {
      trigger: '.mid-words-container',
      start: 'top 65%',
      end: 'top 20%',
      // diration: 2,
      scrub: true,
    },
  });
  let tlMobileMidWords = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mobile-mid-words-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });

  tlMobileMidWords.from('.mobile-mid-words-wrap', {
    y: 100,
    scrollTrigger: {
      trigger: '.mobile-mid-words-container',
      start: 'top 110%',
      end: 'top 40%',
      // diration: 2,
      scrub: true,
    },
  });
  tlMobileMidWords.to('.mobile-mid-words-wrap .dynamic', {
    y: -110,
    scrollTrigger: {
      trigger: '.mobile-mid-words-container',
      start: 'top 65%',
      end: 'top 20%',
      // diration: 2,
      scrub: true,
    },
  });
  let tlBottomWords = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.bottom-words-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });

  tlBottomWords.from('.bottom-words-wrap', {
    y: 100,
    scrollTrigger: {
      trigger: '.bottom-words-container',
      start: 'top 110%',
      end: 'top 40%',
      // diration: 2,
      scrub: true,
    },
  });
  tlBottomWords.to('.bottom-words-wrap .dynamic', {
    y: -110,
    scrollTrigger: {
      trigger: '.bottom-words-container',
      start: 'top 65%',
      end: 'top 20%',
      // diration: 2,
      scrub: true,
    },
  });

  /**
   * Left column Animations
   */
  let tlLeftTopImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.left-top-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlLeftTopImage.from('.left-top-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.left-top-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlLeftMidImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.left-second-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlLeftMidImage.from('.left-second-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.left-second-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlLeftBottomImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.left-third-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlLeftBottomImage.from('.left-third-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.left-third-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  /**
   * Mid column Animations
   */
  let tlMidTopImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mid-top-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMidTopImage.from('.mid-top-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 120,
    scrollTrigger: {
      trigger: '.mid-top-image-container',
      start: 'top 70%',
      end: 'top 5%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlMobileMidTopImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mobile-mid-top-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMobileMidTopImage.from('.mobile-mid-top-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 120,
    scrollTrigger: {
      trigger: '.mobile-mid-top-image-container',
      start: 'top 70%',
      end: 'top 5%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlMidSecondImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mid-second-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMidSecondImage.from('.mid-second-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.mid-second-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlMobileMidSecondImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mobile-mid-second-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMobileMidSecondImage.from('.mobile-mid-second-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.mobile-mid-second-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlMidThirdImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mid-third-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMidThirdImage.from('.mid-third-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.mid-third-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlMobileMidThirdImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mobile-mid-third-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMobileMidThirdImage.from('.mobile-mid-third-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.mobile-mid-third-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlMidBottomImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mid-bottom-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMidBottomImage.from('.mid-bottom-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.mid-bottom-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlMobileMidBottomImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.mobile-mid-bottom-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlMobileMidBottomImage.from('.mobile-mid-bottom-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.mobile-mid-bottom-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });

  /**
   * Right column Animations
   */
  let tlRightTopImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.right-top-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlRightTopImage.from('.right-top-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.right-top-image-container',
      start: 'top 100%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlRightSecondImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.right-second-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlRightSecondImage.from('.right-second-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 120,
    scrollTrigger: {
      trigger: '.right-second-image-container',
      start: 'top 70%',
      end: 'top 5%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlRightThirdImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.right-third-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlRightThirdImage.from('.right-third-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.right-third-image-container',
      start: 'top 70%',
      end: 'top 35%',
      // diration: 3,
      scrub: true,
    },
  });
  /**
   * Bottom Images Animations
   */
  let tlBottomFirstImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.bottom-first-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlBottomFirstImage.from('.bottom-first-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.bottom-first-image-container',
      start: 'top 70%',
      end: 'top 5%',
      // diration: 3,
      scrub: true,
    },
  });
  let tlBottomSecondImage = gsap.timeline({
    // yes, we can add it to an entire timeline!
    scrollTrigger: {
      trigger: '.bottom-second-image-container',
      pin: false, // pin the trigger element while active
      start: 'top 100%',
      // markers: { startColor: 'green', endColor: 'red', fontSize: '12px' },
    },
  });
  tlBottomSecondImage.from('.bottom-second-image-wrap', {
    opacity: 0.2, // Initial opacity set to 0
    y: 100,
    scrollTrigger: {
      trigger: '.bottom-second-image-container',
      start: 'top 70%',
      end: 'top 5%',
      // diration: 3,
      scrub: true,
    },
  });
}
