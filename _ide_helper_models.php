<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category query()
 */
	class Category extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Sale
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\SalesDetail[] $salesdetails
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Sale query()
 */
	class Sale extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Product
 *
 * @property-read \App\Model\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\SalesDetail[] $salesdetails
 * @property-read \App\Model\Stock $stock
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product info()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product query()
 */
	class Product extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Purchase
 *
 * @property-read \App\Model\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchase query()
 */
	class Purchase extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Stock
 *
 * @property-read \App\Model\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stock query()
 */
	class Stock extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User query()
 */
	class User extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\SalesDetail
 *
 * @property-read \App\Model\Product $product
 * @property-read \App\Model\Sale $sale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SalesDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SalesDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SalesDetail query()
 */
	class SalesDetail extends \Eloquent {}
}

