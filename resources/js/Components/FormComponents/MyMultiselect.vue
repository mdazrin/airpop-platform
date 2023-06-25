<template>
    <div
        class="my-multiselect"
        :style="{ width: width }"
        @click="handleClick"
        tabindex="-1"
        ref="parent"
        @blur="focused = false"
    >
        <div class="my-multiselect__placeholder" v-if="value.length === 0">
            {{ placeholder }}...
        </div>
        <div
            class="my-multiselect__selected"
            v-for="(option, i) in formatedOptions"
            :key="i"
            v-show="option.checked"
        >
            <span>{{ option[displayProperty] }}</span>
            <span
                class="my-multiselect__remove"
                @click="
                    preventClose($event);
                    handleOptionClick(i);
                "
            >
                &times;
            </span>
        </div>
        <div
            class="my-multiselect__options"
            v-show="focused"
            @click="preventClose"
            :style="{ top: optionsTop }"
        >
            <div
                class="my-multiselect__option"
                :class="{ 'my-multiselect__option--checked': option.checked }"
                v-for="(option, i) in formatedOptions"
                :key="i"
                @click="handleOptionClick(i)"
            >
                <div class="my-multiselect__checkbox"></div>
                <div class="my-multiselect__text">
                    {{ option[displayProperty] }}
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, defineProps, defineEmits, onMounted } from "vue";

const optionsTop = ref("34px");
const focused = ref(false);

const props = defineProps({
    width: {
        type: String,
        default: "333px",
    },
    options: {
        type: Array,
        default: () => [],
    },
    value: {
        type: Array,
        default: () => [],
    },
    placeholder: {
        type: String,
        default: "Click to select",
    },
    displayProperty: {
        type: String,
        default: "name",
    },
    valueProperty: {
        type: String,
        default: "value",
    },
    required: {
        default: false,
    },
});

const emit = defineEmits(["update:value"]); // Define emitted event

const formatedOptions = computed(() => {
    return props.options.map((option) => {
        let checked = props.value.some(
            (item) => item === option[props.valueProperty]
        );
        return { ...option, checked };
    });
});

const fixTop = () => {
    optionsTop.value = parent.clientHeight + 2 + "px";
};

const handleOptionClick = (i) => {
    let newValue = [...props.value];

    if (!formatedOptions.value[i].checked) {
        newValue.push(props.options[i][props.valueProperty]);
    } else {
        let existIndex = props.value.findIndex(
            (v) => v === props.options[i][props.valueProperty]
        );
        console.log(existIndex);
        newValue.splice(existIndex, 1);
    }

    emit("update:value", newValue);

    setTimeout(fixTop, 100);
};

const preventClose = (e) => {
    e.stopPropagation();
};

const handleClick = () => {
    focused.value = !focused.value;
};

onMounted(() => {
    fixTop();
});
</script>

<style>
.my-multiselect {
    background: #fff;
    padding: 6px 12px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    min-height: 33px;
    min-width: 222px;
    position: relative;
    display: flex;
    flex-wrap: wrap;
}

.my-multiselect:focus {
    outline: none;
}

.my-multiselect__placeholder {
    color: #929292;
}

.my-multiselect__selected {
    border: 1px solid #e0e0e0;
    padding: 4px 8px;
    padding-right: 0;
    margin: 3px 3px;
}

.my-multiselect__remove {
    cursor: pointer;
    padding-right: 7px;
}

.my-multiselect__remove:hover {
    color: red;
    font-weight: bold;
}

.my-multiselect__options {
    position: absolute;
    top: 34px;
    right: 0;
    left: 0;
    display: flex;
    background: #fff;
    flex-direction: column;
    box-shadow: 0 3px 3px 2px #e3e3e3;
    padding: 5px 0;
    min-height: 55px;
    max-height: 188px;
    overflow-y: auto;
}

.my-multiselect__option {
    padding: 6px 11px;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.my-multiselect__option--checked {
    color: #1f7bb8;
    font-weight: bold;
}

.my-multiselect__checkbox {
    width: 22px;
    height: 22px;
    border: 1px solid #969696;
    margin-right: 7px;
    position: relative;
    /* background: #1f7bb8; */
}

.my-multiselect__option--checked .my-multiselect__checkbox {
    border: 1px solid #1f7bb8;
    background: #1f7bb8;
}

.my-multiselect__option--checked .my-multiselect__checkbox::after {
    width: 11px;
    height: 6px;
    border-left: 2px solid rgb(255, 255, 255);
    border-bottom: 2px solid rgb(255, 255, 255);
    content: "";
    z-index: 9999;
    position: absolute;
    transform: rotate(-45deg);
    left: 3px;
    top: 4px;
}
</style>
