<?php

namespace App\Controller;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use Pimcore\Controller\FrontendController;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Model\Asset;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Knp\Component\Pager\PaginatorInterface;


class GalleryController extends FrontendController
{
    #[Template('content/default.html.twig')]
    public function defaultAction (Request $request): array
    {
        return [];
    }
    // Emmet example
    // header>img.logo+nav>ul.menu>(li>a)*3
  

    #[Route('/album/{id}', name: 'gallery_album')]
    public function albumAction(Request $request, PaginatorInterface $paginator): Response
    {
        // dd($request->getPathInfo());
        $id = (int) $request->attributes->get('id');
        $pagination = null;
     
        if ($id) {
            $parentAsset = Asset::getById($id);
    
            if (!$parentAsset || !$parentAsset instanceof \Pimcore\Model\Asset\Folder) {
                return new JsonResponse(['error' => 'Parent asset not found or not a folder']);
            }
            
            // Get all assets from folder
            $allAssets = $this->getAllAssetsFromFolder($parentAsset);
            
            // Paginate the assets (if there are any)
            $pagination = $paginator->paginate(
                $allAssets,
                $request->query->getInt('page', 1), // Current page number
                3 // Limit per page
            );
        }
     
        // Ensure pagination is set to a valid object, even if no assets exist
        if (!$pagination) {
            $pagination = $paginator->paginate([], $request->query->getInt('page', 1), 3);
        }
    
        return $this->render('pages/album.html.twig', [
            'pagination' => $pagination
          
        ]);
    }
    
      
    private function getAllAssetsFromFolder(\Pimcore\Model\Asset\Folder $folder): array
    {
        $assets = [];
        foreach ($folder->getChildren() as $child) {
            if ($child instanceof \Pimcore\Model\Asset\Folder) {
                $assets = array_merge($assets, $this->getAllAssetsFromFolder($child));
            } else {
                $assets[] = $child;            
            }
        }
    
        return $assets;
    }


}