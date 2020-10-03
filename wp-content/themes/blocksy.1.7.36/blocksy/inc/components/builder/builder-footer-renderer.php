<?php

class Blocksy_Footer_Builder_Render extends Blocksy_Builder_Render {
	public function get_section_type() {
		return 'footer';
	}

	public function contains_item($item, $is_primary = false) {
		if (is_customize_preview()) {
			return true;
		}

		if ($is_primary) {
			return ! $this->is_row_empty($item);
		}

		$section = $this->get_current_section();

		foreach (array_values($section['rows']) as $row) {
			foreach ($row['columns'] as $single_column) {
				if (in_array($item, $single_column)) {
					return true;
				}
			}
		}

		return false;
	}

	public function get_current_section_id() {
		return blocksy_manager()->footer_builder->get_current_section_id();
	}

	public function get_current_section() {
		return blocksy_manager()->footer_builder->get_current_section();
	}

	public function render() {
		$content = '';

		$footer = $this->get_current_section();
		$atts = $footer['settings'];

		foreach ($this->get_current_section()['rows'] as $row) {
			$content .= $this->render_row($row);
		}

		return blocksy_html_tag(
			'footer',
			array_merge(
				[
					'class' => 'site-footer',
					'data-id' => $this->get_short_section_id()
				],
				blocksy_schema_org_definitions('footer', [
					'array' => true
				])
			),
			$content
		);
	}

	public function render_row($row) {
		if ($this->is_row_empty($row)) {
			return '';
		}

		$row_config = $this->get_item_config_for($row['id']);

		$simplified_id = str_replace(
			'-row',
			'',
			$row['id']
		);

		$atts = $this->get_item_data_for($row['id']);

		$count = count($row['columns']);

		$data_stack = [];

		if ($count === 2) {
			$columns = blocksy_default_akg(
				'2_columns_layout',
				$atts,
				[
					'desktop' => 'repeat(2, 1fr)',
					'tablet' => 'initial',
					'mobile' => 'initial'
				]
			);

			if ($columns['tablet'] === 'initial') {
				$data_stack = ['data-stack' => 'tablet'];
			}
		}

		if ($count === 3) {
			$columns = blocksy_default_akg(
				'3_columns_layout',
				$atts,
				[
					'desktop' => 'repeat(3, 1fr)',
					'tablet' => 'initial',
					'mobile' => 'initial'
				]
			);

			if ($columns['tablet'] === 'initial') {
				$data_stack = ['data-stack' => 'tablet'];
			}
		}

		if ($count === 4) {
			$columns = blocksy_default_akg(
				'4_columns_layout',
				$atts,
				[
					'desktop' => 'repeat(4, 1fr)',
					'tablet' => 'initial',
					'mobile' => 'initial'
				]
			);

			if ($columns['tablet'] === 'initial') {
				$data_stack = ['data-stack' => 'tablet'];
			}
		}

		$container_class = 'ct-container';

		if (blocksy_default_akg('footerRowWidth', $atts, 'fixed') !== 'fixed') {
			$container_class = 'ct-container-fluid';
		}

		$divider_output = [];

		if (blocksy_default_akg('footerColumnsDivider', $atts, [
			'width' => 1,
			'style' => 'none',
			'color' => [
				'color' => '#dddddd',
			],

		])['style'] !== 'none') {
			$divider_output = ['data-divider' => 'columns'];
		}

		$row_divider_output = [];

		if (blocksy_default_akg('footerRowTopDivider', $atts, [
			'width' => 1,
			'style' => 'none',
			'color' => [
				'color' => '#dddddd',
			],
		])['style'] !== 'none') {
			$row_divider_output[] = 'top';
		}

		if (blocksy_default_akg('footerRowBottomDivider', $atts, [
			'width' => 1,
			'style' => 'none',
			'color' => [
				'color' => '#dddddd',
			],
		])['style'] !== 'none') {
			$row_divider_output[] = 'bottom';
		}

		if (! empty($row_divider_output)) {
			$row_divider_output = [
				'data-divider' => implode(':', $row_divider_output)
			];
		}

		$visibility_classes = blocksy_visibility_classes(
			blocksy_default_akg(
				'footerRowVisibility',
				$atts,
				[
					'desktop' => true,
					'tablet' => true,
					'mobile' => true,
				]
			)
		);

		if (! empty($visibility_classes)) {
			$row_divider_output['class'] = $visibility_classes;
		}

		$row_container_attr = array_merge([
			'data-row' => $simplified_id,
		], $row_divider_output, (
			is_customize_preview() ? [
				'data-item-label' => $row_config['config']['name'],
				'data-shortcut' => 'border',
				'data-location' => $this->get_customizer_location_for(
					$row['id']
				),
			] : []
		), (
			[]
		));

		$columns_wrapper_attr = array_merge([
			'class' => $container_class
		], $divider_output, $data_stack);

		$result = '<div ' . blocksy_attr_to_html($row_container_attr) . '>';
		$result .= '<div ' . blocksy_attr_to_html($columns_wrapper_attr) . '>';

		foreach ($row['columns'] as $index => $column) {
			$items = $this-> render_items_collection($column);

			$column_id = '';

			$column_attr = [];

			$column_attr['data-column'] = '';

			if (count($column) > 0) {
				$column_attr['data-column'] = $column[0];

				if (
					strpos($column[0], 'widget-area') !== false
					&&
					is_customize_preview()
				) {
					$column_attr['data-shortcut'] = 'border-dashed';
					$column_attr['data-location'] = $this->get_customizer_location_for($column[0]);
				}
			}

			if (! empty(trim($items))) {
				$result .= '<div ' . blocksy_attr_to_html($column_attr) . '>';
				$result .= $items;
				$result .= '</div>';
			} else {
				$result .= '<span data-column>';
				$result .= '</span>';
			}
		}

		$result .= '</div>';
		$result .= '</div>';

		return $result;
	}

	public function is_row_empty($row) {
		if (! is_array($row)) {
			$row = $this->get_primary_item($row);
		}

		if (! isset($row['columns'])) {
			return true;
		}

		if (count($row['columns']) === 0) {
			return true;
		}

		foreach ($row['columns'] as $column) {
			if (!is_array($column)) {
				continue;
			}

			if (! empty($column)) {
				return false;
			}
		}

		return true;
	}

	private function render_items_collection($items) {
		$result = '';

		foreach ($items as $item) {
			$result .= $this->render_single_item($item);
		}

		return $result;
	}

	public function render_single_item($item_id) {
		$item = null;

		$registered_items = blocksy_manager()
			->builder
			->get_registered_items_by($this->get_section_type());

		foreach ($registered_items as $single_item) {
			if ($single_item['id'] === $item_id) {
				$item = $single_item;
				break;
			}
		}

		$not_registered_label = sprintf(
			// translated: %s is the panel builder item ID that is missing
			__(
				'Item %s not registered or doesn\'t have a view.php file.',
				'blocksy'
			),
			$item_id
		);

		if (! $item) {
			return $not_registered_label;
		}

		return blocksy_render_view(
			$item['path'] . '/view.php',
			[
				'atts' => $this->get_item_data_for($item_id),
				'footer_id' => $this->get_current_section_id(),
				'attr' => array_merge([
					'data-id' => $this->shorten_id($item_id),
				], (
					is_customize_preview() ? [
						'data-item-label' => $item['config']['name'],
						'data-shortcut' => $item['config']['shortcut_style'],
						'data-location' => $this->get_customizer_location_for($item_id)
					] : []
				)),
			],
			$not_registered_label
		);
	}

	public function get_primary_item($id) {
		$builder_value = $this->get_current_section();

		foreach ($builder_value['rows'] as $row) {
			if ($row['id'] === $id) {
				return $row;
			}
		}

		return [];
	}
}

