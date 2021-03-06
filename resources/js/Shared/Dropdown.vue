<template>
    <div class="relative">
        <button ref="trigger" type="button" class="relative" @click="toggle">
            <slot name="trigger" />
        </button>

        <transition
            enter-class="opacity-0 scale-90"
            enter-active-class="ease-out transition-fastest"
            enter-to-class="opacity-100 scale-100"
            leave-class="opacity-100 scale-100"
            leave-active-class="ease-in transition-fastest"
            leave-to-class="opacity-0 scale-90"
        >
            <!-- Replace "right-0 origin-top-right" with "left-0 origin-top-left" to left-align the dropdown -->
            <div v-if="show" class="-mt-1 absolute right-0 origin-top-right">
                <div style="position: fixed; top: 0; right: 0; left: 0; bottom: 0; z-index: 90; background: transparent;" @click="close()" />
                <div ref="dropdown" :style="getStyles()" @click.stop>
                    <slot name="dropdown" />
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import { mapValues } from 'lodash';

export default {
    props: {
        width: {
            type: String,
            default: '140px',
        },
        top: {
            type: String,
            default: '20',
        },
        right: {
            type: String,
            default: '10',
        },
        nav: {
            type: Boolean,
            default: false,
        },
    },
    data () {
        return {
            show: false,
        }
    },
    beforeDestroy () {
        document.removeEventListener('scroll', this.setTriggerZindex);
        document.removeEventListener('keydown', this.hideDropdownOnEscape);
    },
    mounted () {
        document.addEventListener('keydown', this.hideDropdownOnEscape);
        document.addEventListener('scroll', this.setTriggerZindex);
        this.$listen('dropdown-should-close', () => {
            this.close();
        });
    },
    methods: {
        close () {
            this.show = false;
        },
        toggle () {
            this.show = !this.show;
        },
        getStyles () {
            let properties = {
                width: this.width,
                top: this.top,
                right: this.right,
            };

            let mutatedProperties = mapValues(properties, property => {
                if (property != '0' & ! property.endsWith('px')) {
                    return `${property}px`;
                }

                return property;
            });

            return `position: absolute; width:${mutatedProperties.width}; top:${mutatedProperties.top}; right:${mutatedProperties.right}; z-index: 9999;`;
        },
        setTriggerZindex (e) {
            let top = this.$refs.trigger.getBoundingClientRect().top;

            if (top < 175 && ! this.nav) {
                this.$refs.trigger.style.zIndex = 20;
            } else {
                this.$refs.trigger.style.zIndex = 70;
            }
        },
        hideDropdownOnEscape (e) {
            if (e.keyCode === 27) {
                this.close();
            }
        },
    },
}
</script>
