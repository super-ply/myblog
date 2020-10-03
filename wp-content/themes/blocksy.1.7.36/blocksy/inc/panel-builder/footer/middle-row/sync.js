import { handleBackgroundOptionFor } from '../../../../static/js/customizer/sync/variables/background'
import ctEvents from 'ct-events'
import { typographyOption } from '../../../../static/js/customizer/sync/variables/typography'
import {
	getRootSelectorFor,
	assembleSelector,
	mutateSelector,
	responsiveClassesFor,
	withKeys,
} from '../../../../static/js/customizer/sync/helpers'

export const handleRowVariables = ({ itemId }) => ({
	footerItemsGap: {
		selector: assembleSelector(
			mutateSelector({
				selector: getRootSelectorFor({ itemId, panelType: 'footer' }),
				operation: 'suffix',
				to_add: '> div',
			})
		),
		variable: 'itemsGap',
		responsive: true,
		unit: 'px',
	},

	rowTopBottomSpacing: {
		selector: assembleSelector(
			mutateSelector({
				selector: getRootSelectorFor({ itemId, panelType: 'footer' }),
				operation: 'suffix',
				to_add: '> div',
			})
		),
		variable: 'containerSpacing',
		responsive: true,
		unit: '',
	},

	...typographyOption({
		id: 'footerWidgetsTitleFont',

		selector: assembleSelector(
			mutateSelector({
				selector: getRootSelectorFor({ itemId, panelType: 'footer' }),
				operation: 'suffix',
				to_add: '.widget-title',
			})
		),
	}),

	footerWidgetsTitleColor: {
		selector: assembleSelector(
			mutateSelector({
				selector: getRootSelectorFor({ itemId, panelType: 'footer' }),
				operation: 'suffix',
				to_add: '.widget-title',
			})
		),
		variable: 'headingColor',
		type: 'color',
		responsive: true,
	},

	...typographyOption({
		id: 'footerWidgetsFont',

		selector: assembleSelector(
			mutateSelector({
				selector: getRootSelectorFor({ itemId, panelType: 'footer' }),
				operation: 'suffix',
				to_add: '.ct-widget > *:not(.widget-title)',
			})
		),
	}),

	rowFontColor: [
		{
			selector: assembleSelector(
				mutateSelector({
					selector: getRootSelectorFor({
						itemId,
						panelType: 'footer',
					}),
					operation: 'suffix',
					to_add: '.ct-widget > *:not(.widget-title)',
				})
			),
			variable: 'color',
			type: 'color:default',
			responsive: true,
		},

		{
			selector: assembleSelector(
				mutateSelector({
					selector: getRootSelectorFor({
						itemId,
						panelType: 'footer',
					}),
					operation: 'suffix',
					to_add: '.ct-widget',
				})
			),
			variable: 'linkInitialColor',
			type: 'color:link_initial',
			responsive: true,
		},

		{
			selector: assembleSelector(
				mutateSelector({
					selector: getRootSelectorFor({
						itemId,
						panelType: 'footer',
					}),
					operation: 'suffix',
					to_add: '.ct-widget',
				})
			),
			variable: 'linkHoverColor',
			type: 'color:link_hover',
			responsive: true,
		},
	],

	footerRowTopDivider: {
		selector: assembleSelector(
			getRootSelectorFor({ itemId, panelType: 'footer' })
		),
		variable: 'borderTop',
		type: 'border',
	},

	footerRowBottomDivider: {
		selector: assembleSelector(
			getRootSelectorFor({ itemId, panelType: 'footer' })
		),
		variable: 'borderBottom',
		type: 'border',
	},

	footerColumnsDivider: {
		selector: assembleSelector(
			mutateSelector({
				selector: getRootSelectorFor({ itemId, panelType: 'footer' }),
				operation: 'suffix',
				to_add: '[data-divider="columns"]',
			})
		),
		variable: 'border',
		type: 'border',
	},

	...handleBackgroundOptionFor({
		id: 'footerRowBackground',
		selector: assembleSelector(
			getRootSelectorFor({ itemId, panelType: 'footer' })
		),
	}),

	...withKeys(
		[
			'items_per_row',
			'2_columns_layout',
			'3_columns_layout',
			'4_columns_layout',
		],
		{
			selector: assembleSelector(
				mutateSelector({
					selector: getRootSelectorFor({
						itemId,
						panelType: 'footer',
					}),
					operation: 'suffix',
					to_add: '> div',
				})
			),
			variable: 'gridTemplateColummns',
			responsive: true,
			fullValue: true,
			extractValue: (values) => {
				const row = document.querySelector(
					assembleSelector(
						getRootSelectorFor({ itemId, panelType: 'footer' })
					)
				)

				if (
					row &&
					parseInt(values.items_per_row, 10) !==
						row.querySelectorAll('[data-column]').length
				) {
					;[...row.querySelectorAll('span[data-column]')].map((el) =>
						el.remove()
					)

					if (
						row.querySelectorAll('[data-column]').length >
						parseInt(values.items_per_row, 10)
					) {
						;[
							...Array(
								row.querySelectorAll('[data-column]').length -
									parseInt(values.items_per_row, 10)
							),
						].map(() =>
							row
								.querySelector('[data-column]')
								.parentNode.lastElementChild.remove()
						)
					}

					if (
						row.querySelectorAll('[data-column]').length <
						parseInt(values.items_per_row, 10)
					) {
						;[
							...Array(
								parseInt(values.items_per_row, 10) -
									row.querySelectorAll('[data-column]').length
							),
						].map(() =>
							row
								.querySelector('[class*="ct-container"]')
								.insertAdjacentHTML(
									'beforeend',
									'<span data-column></span>'
								)
						)
					}
				}

				if (parseInt(values.items_per_row, 10) === 2) {
					return (
						values['2_columns_layout'] || {
							desktop: 'repeat(2, 1fr)',
							tablet: 'initial',
							mobile: 'initial',
						}
					)
				}

				if (parseInt(values.items_per_row, 10) === 3) {
					return (
						values['3_columns_layout'] || {
							desktop: 'repeat(3, 1fr)',
							tablet: 'initial',
							mobile: 'initial',
						}
					)
				}

				if (parseInt(values.items_per_row, 10) === 4) {
					return (
						values['4_columns_layout'] || {
							desktop: 'repeat(4, 1fr)',
							tablet: 'initial',
							mobile: 'initial',
						}
					)
				}

				return {
					desktop: 'initial',
					tablet: 'initial',
					mobile: 'initial',
				}
			},
		}
	),
})

export const handleRowOptions = ({
	selector,
	changeDescriptor: { optionId, optionValue, values },
}) => {
	const el = document.querySelector(selector)

	if (optionId === 'footerColumnsDivider') {
		el.firstElementChild.removeAttribute('data-divider')

		if (optionValue.style !== 'none') {
			el.firstElementChild.dataset.divider = 'columns'
		}
	}

	if (optionId === 'footerRowVisibility') {
		responsiveClassesFor(optionValue, el)
	}

	if (
		optionId === 'footerRowTopDivider' ||
		optionId === 'footerRowBottomDivider'
	) {
		el.removeAttribute('data-divider')
		const components = []

		if (
			values.footerRowTopDivider &&
			values.footerRowTopDivider.style !== 'none'
		) {
			components.push('top')
		}

		if (
			values.footerRowBottomDivider &&
			values.footerRowBottomDivider.style !== 'none'
		) {
			components.push('bottom')
		}

		if (components.length > 0) {
			el.dataset.divider = components.join(':')
		}
	}

	el.firstElementChild.removeAttribute('data-stack')

	if (parseInt(values.items_per_row, 10) === 2) {
		const columns = values['2_columns_layout'] || {
			desktop: 'repeat(2, 1fr)',
			tablet: 'initial',
			mobile: 'initial',
		}

		if (columns['tablet'] === 'initial') {
			el.firstElementChild.dataset.stack = 'tablet'
		}
	}

	if (parseInt(values.items_per_row, 10) === 3) {
		const columns = values['3_columns_layout'] || {
			desktop: 'repeat(3, 1fr)',
			tablet: 'initial',
			mobile: 'initial',
		}

		if (columns['tablet'] === 'initial') {
			el.firstElementChild.dataset.stack = 'tablet'
		}
	}

	if (parseInt(values.items_per_row, 10) === 4) {
		const columns = values['4_columns_layout'] || {
			desktop: 'repeat(4, 1fr)',
			tablet: 'initial',
			mobile: 'initial',
		}

		if (columns['tablet'] === 'initial') {
			el.firstElementChild.dataset.stack = 'tablet'
		}
	}
}

ctEvents.on(
	'ct:footer:sync:collect-variable-descriptors',
	(variableDescriptors) => {
		variableDescriptors['middle-row'] = handleRowVariables
	}
)

ctEvents.on('ct:footer:sync:item:middle-row', (changeDescriptor) =>
	handleRowOptions({
		selector: '.site-footer [data-row="middle"]',
		changeDescriptor,
	})
)
