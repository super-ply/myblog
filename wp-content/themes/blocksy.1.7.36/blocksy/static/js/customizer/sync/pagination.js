import {
	getPrefixFor,
	getOptionFor,
	responsiveClassesFor,
	watchOptionsWithPrefix,
	applyPrefixFor
} from './helpers'

const prefix = getPrefixFor({
	allowed_prefixes: ['blog', 'woo_categories'],
	default_prefix: 'blog'
})

watchOptionsWithPrefix({
	getPrefix: () => prefix,
	getOptionsForPrefix: () => [
		`${prefix}_load_more_label`,
		`${prefix}_paginationDivider`
	],

	render: () => {
		if (document.querySelector('.ct-load-more')) {
			document.querySelector('.ct-load-more').innerHTML = getOptionFor(
				'load_more_label',
				prefix
			)
		}

		;[...document.querySelectorAll('.ct-pagination')].map(el => {
			el.removeAttribute('data-divider')

			if (getOptionFor('paginationDivider', prefix).style === 'none')
				return

			if (
				getOptionFor('pagination_global_type', prefix) ===
				'infinite_scroll'
			) {
				return
			}

			el.dataset.divider = ''
		})
	}
})

export const getPaginationVariables = () => ({
	[`${prefix}_paginationSpacing`]: {
		selector: applyPrefixFor(
			'.ct-pagination',
			prefix === 'blog' ? '' : prefix
		),
		variable: 'spacing',
		responsive: true,
		unit: 'px'
	},

	[`${prefix}_paginationDivider`]: {
		selector: applyPrefixFor(
			'.ct-pagination[data-divider]',
			prefix === 'blog' ? '' : prefix
		),
		variable: 'border',
		type: 'border'
	},

	[`${prefix}_simplePaginationFontColor`]: [
		{
			selector: applyPrefixFor(
				'.ct-pagination[data-type="simple"], .ct-pagination[data-type="next_prev"]',
				prefix === 'blog' ? '' : prefix
			),
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: applyPrefixFor(
				'.ct-pagination[data-type="simple"]',
				prefix === 'blog' ? '' : prefix
			),
			variable: 'colorActive',
			type: 'color:active'
		},

		{
			selector: applyPrefixFor(
				'.ct-pagination[data-type="simple"], .ct-pagination[data-type="next_prev"]',
				prefix === 'blog' ? '' : prefix
			),
			variable: 'linkHoverColor',
			type: 'color:hover'
		}
	],

	[`${prefix}_paginationButtonText`]: [
		{
			selector: applyPrefixFor(
				'.ct-pagination[data-type="load_more"]',
				prefix === 'blog' ? '' : prefix
			),
			variable: 'buttonTextInitialColor',
			type: 'color:default'
		},

		{
			selector: applyPrefixFor(
				'.ct-pagination[data-type="load_more"]',
				prefix === 'blog' ? '' : prefix
			),
			variable: 'buttonTextHoverColor',
			type: 'color:hover'
		}
	],

	[`${prefix}_paginationButton`]: [
		{
			selector: applyPrefixFor(
				'.ct-pagination[data-type="load_more"]',
				prefix === 'blog' ? '' : prefix
			),
			variable: 'buttonInitialColor',
			type: 'color:default'
		},

		{
			selector: applyPrefixFor(
				'.ct-pagination[data-type="load_more"]',
				prefix === 'blog' ? '' : prefix
			),
			variable: 'buttonHoverColor',
			type: 'color:hover'
		}
	]
})
