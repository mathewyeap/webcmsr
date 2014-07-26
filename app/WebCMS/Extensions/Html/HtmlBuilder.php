<?php namespace WebCMS\Extensions\Html;

class HtmlBuilder extends \Illuminate\Html\HtmlBuilder {

	public function colourSchemePicker($inputId)
	{
		$colourSchemes = \ColourScheme::colourSchemes()->get();

		$html = <<<HTML
		<table class="colour-picker table table-condensed text-center">
			<tbody>
HTML;

		foreach ($colourSchemes->chunk(5) as $row)
		{
			$html .= '<tr>';

			foreach ($row as $colourScheme)
			{
				$name = ucfirst($colourScheme->name);
				$textColour = $colourScheme->text;
				$html .= <<<HTML
<td style="background:$colourScheme->bg">
	<a href="javascript:;" class="btn" style="color:$colourScheme->text">
		<span style="font-size:8pt">$name</span>
	</a>
</td>
HTML;
			}

			$html .= '</tr>';
		}

		$html .= <<<HTML
		</tbody>
	</table>
	<script>
		$('table.colour-picker').find('a').click(function() {
			$('#$inputId').css('background-color', $(this).closest('td').css('background-color'));
			$('#$inputId').css('color', $(this).css('color'));
			$('#$inputId').val($(this).text().trim().toLowerCase());
		});
	</script>
	<p class="text-success">
		<small>Click on the name in a cell to choose the color scheme</small>
	</p>
HTML;

		return $html;
	}
}