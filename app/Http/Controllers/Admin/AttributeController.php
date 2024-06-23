<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\SubAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    /**
     * Show the form for creating or editing a resource.
     */
 public function createOrEdit($id = null)
    {
        $product = null;
        $attributes = [];
        $options = []; // Initialize options
        $index = ''; // Initialize index

        if ($id) {
            // Attempt to find the product
            $product = Product::find($id);

            // If product found, fetch its attributes and options
            if ($product) {
                $attributes = Attribute::where('product_id', $id)->get();
                $options = SubAttribute::whereIn('attribute_id', $attributes->pluck('id'))->get(); // Fetch options
                $index = 0; // Set index for editing existing attributes
            }
        }

        return view('admin.attribute.create', compact('id', 'product', 'attributes', 'options', 'index'));
    }


    /**
     * Store or update a newly created or existing resource in storage.
     */
  public function storeOrUpdate(Request $request)
{
    // Retrieve form data
    $postData = $request->input('m');
    $product_id = $request->input('product_id');

    unset($postData['mid']);

    foreach ($postData as $index => $attributeData) {
        // Check if attribute already exists
        if (isset($attributeData['id'])) {
            $attribute = Attribute::find($attributeData['id']);
        } else {
            $attribute = new Attribute();
        }

        // Update or set attribute fields
        $attribute->title = $attributeData['title'] ?? null;
        $attribute->input_type = isset($attributeData['input_type']) ? ($attributeData['input_type'] === '' ? null : $attributeData['input_type']) : null;
        $attribute->is_required = $attributeData['is_required'] ?? null;
        $attribute->short_order = $attributeData['short_order'] ?? null;
        $attribute->option_description = $attributeData['option_description'] ?? null;
        $attribute->product_id = $product_id;

        if (isset($attributeData['input_type']) && $attributeData['input_type'] === '--Please Select--') {
            $attribute->input_type = 0;
        } elseif (isset($attributeData['input_type'])) {
            $attribute->input_type = (int) $attributeData['input_type'];
        }

        $attribute->save();

        if (isset($attributeData['list'])) {
            // Process sub-attributes
            foreach ($attributeData['list'] as $subIndex => $subAttributeData) {
                // Check if sub-attribute already exists
                if (isset($subAttributeData['id'])) {
                    $subAttribute = SubAttribute::find($subAttributeData['id']);
                } else {
                    $subAttribute = new SubAttribute();
                }

                // Update or set sub-attribute fields
                $subAttribute->title = $subAttributeData['title'] ?? null;
                $subAttribute->price = $subAttributeData['price'] ?? 0;
                $subAttribute->price_type = $subAttributeData['price_type'] ?? 1;
                $subAttribute->sku = $subAttributeData['sku'] ?? null;
                $subAttribute->default_se = $subAttributeData['default_se'] ?? 0;
                $subAttribute->short_order = $subAttributeData['short_order'] ?? 0;
                $subAttribute->attribute_id = $attribute->id;

                $subAttribute->save();
            }
        }
    }

    

        // Redirect back with success message
        toastr()->success('Attributes and Options saved successfully');
        return redirect()->back();
    }
}
