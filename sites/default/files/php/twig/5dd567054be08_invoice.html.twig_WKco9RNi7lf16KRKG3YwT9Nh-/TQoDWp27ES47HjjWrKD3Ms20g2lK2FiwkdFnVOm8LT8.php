<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/invoice/templates/invoice.html.twig */
class __TwigTemplate_6b483252e32be7bf064b521483106099730ba5076adcd49cb9d702b754f4f6d0 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 7, "for" => 34, "set" => 35];
        $filters = ["escape" => 1, "t" => 12, "length" => 32];
        $functions = ["attach_library" => 1];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['escape', 't', 'length'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("invoice/invoice.lib"), "html", null, true);
        echo "
<style>
    table{border-collapse: collapse;font-family: Calibri,Arial, Helvetica, sans-serif;overflow: wrap}
    td, th{padding: 5px 10px;height: 20px;text-align:left; font-size: 14px !important}
    th{color:#1f497d;font-weight: bold;}
</style>
";
        // line 7
        if (($context["content"] ?? null)) {
            // line 8
            echo "<div";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "invoice"], "method")), "html", null, true);
            echo ">
    <div class=\"invoice-wrapper\">
      <div class=\"invoice-header row\">
        <div class=\"col-md-9\">
               <label>";
            // line 12
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Address:"));
            echo "</label>
               <div class=\"\"><label>";
            // line 13
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Name: "));
            echo "</label> ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "name", [])), "html", null, true);
            echo "</div>
               <div class=\"\"><label>";
            // line 14
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Company Name: "));
            echo "</label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "company", [])), "html", null, true);
            echo "</div>
               <div class=\"\"><label>";
            // line 15
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Street: "));
            echo "</label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "street", [])), "html", null, true);
            echo "</div>
               <div class=\"\"><label>";
            // line 16
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("House: "));
            echo "</label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "house", [])), "html", null, true);
            echo "</div>
               <div class=\"\"><label>";
            // line 17
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Postal Code: "));
            echo "</label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "postal", [])), "html", null, true);
            echo "</div>
               <div class=\"\"><label>";
            // line 18
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("City: "));
            echo "</label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "city", [])), "html", null, true);
            echo "</div>
            </div>
            <div class=\"col-md-3\">
           <label>";
            // line 21
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Invoice #: "));
            echo "</label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "id", [])), "html", null, true);
            echo "
          <div class=\"field field--label-inline\"> 
          <div class=\"field__label\">";
            // line 23
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Invoice Date"));
            echo "</div>
            <div class=\"field__item\">";
            // line 24
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "invoice_date", [])), "html", null, true);
            echo "</div>
         </div>
        </div>
         </div> ";
            // line 28
            echo "         <div class=\"row\"><div class=\"col-md-12\"><label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Subject: "));
            echo "</label>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "subject", [])), "html", null, true);
            echo "</div></div>";
            // line 29
            echo "         <div class=\"row\">
            <div class=\"col-md-12\">
                    <label>";
            // line 31
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("List Detail:"));
            echo "</label>
                   ";
            // line 32
            if ((twig_length_filter($this->env, $this->getAttribute(($context["content"] ?? null), "list_details", [])) > 0)) {
                // line 33
                echo "                   <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
                ";
                // line 34
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "list_details", []));
                foreach ($context['_seq'] as $context["i"] => $context["field"]) {
                    // line 35
                    echo "                   ";
                    $context["col"] = twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed($context["field"]));
                    // line 36
                    echo "                              ";
                    if (($context["i"] == 0)) {
                        // line 37
                        echo "                         <tr>
                             ";
                        // line 38
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["field"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["list"]) {
                            // line 39
                            echo "                     
                                     <th>";
                            // line 40
                            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["list"], "label", [])), "html", null, true);
                            echo "</th>
                             ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['list'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 42
                        echo "                          </tr>
                               ";
                    }
                    // line 44
                    echo "                                <tr>
                                   ";
                    // line 45
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["field"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["list"]) {
                        // line 46
                        echo "                                     <td>";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["list"], "value", [])), "html", null, true);
                        echo "</td>
                                   ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['list'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 48
                    echo "                                </tr>
              
                     ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['i'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                echo "                      <tr>
                         <td>Discount ";
                // line 52
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["content"] ?? null), "discount_row", []), "desc", [])), "html", null, true);
                echo "%</td>
                         <td>";
                // line 53
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("NA"));
                echo "</td>
                         <td>";
                // line 54
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("NA"));
                echo "</td>
                         <td>-";
                // line 55
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["content"] ?? null), "discount_row", []), "subtotal", [])), "html", null, true);
                echo "</td>
                      </tr>            
                   </table>
                   ";
            }
            // line 59
            echo "               </div>
            </div>";
            // line 61
            echo "          
          <div class=\"row footer-wrap\">
          <div class=\"col-md-8\"></div>
        <div class=\"col-md-4 align-right\">
            <table  width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >
              <tr>
               <td><label>";
            // line 67
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Subtotal: "));
            echo "</label>: </td>
             <td> ";
            // line 68
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "grand_subtotal", [])), "html", null, true);
            echo "</td>
            </tr>
            <tr>
               <td><label>";
            // line 71
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Tax: "));
            echo "</label></td>
             <td>";
            // line 72
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "tax", [])), "html", null, true);
            echo "%</td>
            </tr>
            <tr>
               <td><b>Total: </b></td>
             <td>";
            // line 76
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "total", [])), "html", null, true);
            echo "</td>
            </tr>
          </table>
        </div>
      </div>      
    </div>";
            // line 82
            echo "    <div class=\"align-center\"><a href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pdflink"] ?? null)), "html", null, true);
            echo "\" id=\"download-pdf\" data-file=\"invoice-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null)), "html", null, true);
            echo "\" class=\"download-pdf btn btn-sm btn-success\">Download in PDF</a></div> 
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/custom/invoice/templates/invoice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 82,  262 => 76,  255 => 72,  251 => 71,  245 => 68,  241 => 67,  233 => 61,  230 => 59,  223 => 55,  219 => 54,  215 => 53,  211 => 52,  208 => 51,  200 => 48,  191 => 46,  187 => 45,  184 => 44,  180 => 42,  172 => 40,  169 => 39,  165 => 38,  162 => 37,  159 => 36,  156 => 35,  152 => 34,  149 => 33,  147 => 32,  143 => 31,  139 => 29,  133 => 28,  127 => 24,  123 => 23,  116 => 21,  108 => 18,  102 => 17,  96 => 16,  90 => 15,  84 => 14,  78 => 13,  74 => 12,  66 => 8,  64 => 7,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{{ attach_library('invoice/invoice.lib') }}
<style>
    table{border-collapse: collapse;font-family: Calibri,Arial, Helvetica, sans-serif;overflow: wrap}
    td, th{padding: 5px 10px;height: 20px;text-align:left; font-size: 14px !important}
    th{color:#1f497d;font-weight: bold;}
</style>
{% if content %}
<div{{ attributes.addClass('invoice') }}>
    <div class=\"invoice-wrapper\">
      <div class=\"invoice-header row\">
        <div class=\"col-md-9\">
               <label>{{ 'Address:'|t }}</label>
               <div class=\"\"><label>{{ 'Name: '|t }}</label> {{ content.name }}</div>
               <div class=\"\"><label>{{ 'Company Name: '|t }}</label>{{ content.company }}</div>
               <div class=\"\"><label>{{ 'Street: '|t }}</label>{{ content.street }}</div>
               <div class=\"\"><label>{{ 'House: '|t }}</label>{{ content.house }}</div>
               <div class=\"\"><label>{{ 'Postal Code: '|t }}</label>{{ content.postal }}</div>
               <div class=\"\"><label>{{ 'City: '|t }}</label>{{ content.city }}</div>
            </div>
            <div class=\"col-md-3\">
           <label>{{ 'Invoice #: '|t }}</label>{{ content.id }}
          <div class=\"field field--label-inline\"> 
          <div class=\"field__label\">{{ 'Invoice Date'|t }}</div>
            <div class=\"field__item\">{{ content.invoice_date }}</div>
         </div>
        </div>
         </div> {# row ends #}
         <div class=\"row\"><div class=\"col-md-12\"><label>{{ 'Subject: '|t }}</label>{{ content.subject }}</div></div>{# row ends #}
         <div class=\"row\">
            <div class=\"col-md-12\">
                    <label>{{ 'List Detail:'|t }}</label>
                   {% if content.list_details|length > 0 %}
                   <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
                {% for i,field in content.list_details %}
                   {% set col = field|length  %}
                              {% if i == 0 %}
                         <tr>
                             {% for list in field %}
                     
                                     <th>{{ list.label }}</th>
                             {% endfor %}
                          </tr>
                               {% endif %}
                                <tr>
                                   {% for list in field %}
                                     <td>{{ list.value }}</td>
                                   {% endfor %}
                                </tr>
              
                     {% endfor %}
                      <tr>
                         <td>Discount {{ content.discount_row.desc }}%</td>
                         <td>{{ 'NA'|t }}</td>
                         <td>{{ 'NA'|t }}</td>
                         <td>-{{ content.discount_row.subtotal }}</td>
                      </tr>            
                   </table>
                   {% endif %}
               </div>
            </div>{# row ends #}
          
          <div class=\"row footer-wrap\">
          <div class=\"col-md-8\"></div>
        <div class=\"col-md-4 align-right\">
            <table  width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >
              <tr>
               <td><label>{{ 'Subtotal: '|t }}</label>: </td>
             <td> {{ content.grand_subtotal }}</td>
            </tr>
            <tr>
               <td><label>{{ 'Tax: '|t }}</label></td>
             <td>{{ content.tax }}%</td>
            </tr>
            <tr>
               <td><b>Total: </b></td>
             <td>{{ content.total }}</td>
            </tr>
          </table>
        </div>
      </div>      
    </div>{# invoice-wrapper #}
    <div class=\"align-center\"><a href=\"{{ pdflink }}\" id=\"download-pdf\" data-file=\"invoice-{{ id }}\" class=\"download-pdf btn btn-sm btn-success\">Download in PDF</a></div> 
</div>
{% endif %}", "modules/custom/invoice/templates/invoice.html.twig", "/web/thevalley/modules/custom/invoice/templates/invoice.html.twig");
    }
}
