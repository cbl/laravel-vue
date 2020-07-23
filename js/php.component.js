const Vue = require('vue');

Vue.component('php-component', {
	render(h) {
		return h(this.tag, this.attributes, this.children);
	},
	props: {
		component: {
			type: Object,
			required: true,
		},
	},
	computed: {
		tag() {
			return this.component.tag;
		},
		attributes() {
			return this.getAttributes();
		},
		children() {
			return this.getChildren();
		},
	},
	methods: {
		getAttributes() {
			return {
				class: this.component.classes,
				attrs: {
					...this.$attrs,
					...this.component.props,
				},
				domProps: this.component.domProps,
				style: this.component.styles,
				slot: this.component.slot,
				ref: this.component.ref,
				refInFor: this.component.refInFor,
				key: this.component.key,
			};
		},
		getChildren() {
			let children = [];

			for (let name in this.$slots) {
				children.push(this.$slots[name]);
			}

			return children;
		},

		createPhpComponent() {
			return this.$createElement('php-component', {
				attrs: {
					...this.$attrs,
					component: this.component,
				},
			});
		},

		isPhpComponent(child) {
			if (typeof child !== 'object') {
				return false;
			}
			if (!Object.keys(child).includes('tag')) {
				return false;
			}
			return true;
		},
	},
});
