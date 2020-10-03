import ctEvents from 'ct-events'
import { updateAndSaveEl } from '../../../../static/js/frontend/header/render-loop'
import {
	getRootSelectorFor,
	assembleSelector,
	mutateSelector,
} from '../../../../static/js/customizer/sync/helpers'

ctEvents.on(
	'ct:header:sync:collect-variable-descriptors',
	(variableDescriptors) => {
		variableDescriptors['button'] = ({ itemId }) => ({
			headerCtaMargin: {
				selector: assembleSelector(getRootSelectorFor({ itemId })),
				type: 'spacing',
				variable: 'margin',
				responsive: true,
				important: true,
			},

			headerCtaRadius: {
				selector: assembleSelector(getRootSelectorFor({ itemId })),
				type: 'spacing',
				variable: 'buttonBorderRadius',
				responsive: true,
			},

			// default state
			headerButtonFontColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.ct-button',
						})
					),
					variable: 'buttonTextInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.ct-button',
						})
					),
					variable: 'buttonTextHoverColor',
					type: 'color:hover',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.ct-button-ghost',
						})
					),
					variable: 'buttonTextInitialColor',
					type: 'color:default_2',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.ct-button-ghost',
						})
					),
					variable: 'buttonTextHoverColor',
					type: 'color:hover_2',
					responsive: true,
				},
			],

			headerButtonForeground: [
				{
					selector: assembleSelector(getRootSelectorFor({ itemId })),
					variable: 'buttonInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(getRootSelectorFor({ itemId })),
					variable: 'buttonHoverColor',
					type: 'color:hover',
					responsive: true,
				},
			],

			// transparent state
			transparentHeaderButtonFontColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button',
							}),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'buttonTextInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button',
							}),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'buttonTextHoverColor',
					type: 'color:hover',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button-ghost',
							}),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'buttonTextInitialColor',
					type: 'color:default_2',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button-ghost',
							}),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'buttonTextHoverColor',
					type: 'color:hover_2',
					responsive: true,
				},
			],

			transparentHeaderButtonForeground: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'buttonInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'buttonHoverColor',
					type: 'color:hover',
					responsive: true,
				},
			],

			// sticky state
			stickyHeaderButtonFontColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button',
							}),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'buttonTextInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button',
							}),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'buttonTextHoverColor',
					type: 'color:hover',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button-ghost',
							}),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'buttonTextInitialColor',
					type: 'color:default_2',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.ct-button-ghost',
							}),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'buttonTextHoverColor',
					type: 'color:hover_2',
					responsive: true,
				},
			],

			stickyHeaderButtonForeground: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'buttonInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'buttonHoverColor',
					type: 'color:hover',
					responsive: true,
				},
			],
		})
	}
)

ctEvents.on(
	'ct:header:sync:item:button',
	({ itemId, optionId, optionValue }) => {
		const selector = `[data-id="${itemId}"]`

		if (optionId === 'header_button_type') {
			updateAndSaveEl(selector, (el) => {
				const button = el.querySelector('[class*="ct-button"]')
				button.classList.remove('ct-button', 'ct-button-ghost')

				button.classList.add(
					optionValue === 'type-1' ? 'ct-button' : 'ct-button-ghost'
				)
			})
		}

		if (optionId === 'header_button_size') {
			updateAndSaveEl(selector, (el) => {
				el.querySelector(
					'[class*="ct-button"]'
				).dataset.size = optionValue
			})
		}

		if (optionId === 'header_button_text') {
			updateAndSaveEl(selector, (el) => {
				el.querySelector('[class*="ct-button"]').innerHTML = optionValue
			})
		}

		if (optionId === 'header_button_link') {
			updateAndSaveEl(selector, (el) => {
				el.querySelector('[class*="ct-button"]').href = optionValue
			})
		}
	}
)
