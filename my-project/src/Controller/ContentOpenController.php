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
use \Pimcore\Model\DataObject;


class ContentOpenController extends FrontendController
{
    #[Template('content/default.html.twig')]
    public function defaultAction (Request $request): array
    {
        return [];
    }
    // Emmet example
    // header>img.logo+nav>ul.menu>(li>a)*3 

    #[Route('/collection', name: 'gallery_page_collection')]
    public function mytestAction(Request $request): JsonResponse
    { 
        $data = json_decode($request->getContent(), true);
        
        $parentId = $data['parentId'] ?? null;
        $parentFolderName = $data['parentFolderName'] ??  null;
    
        if ($parentId === null) {
            return new JsonResponse(['error' => 'Parent ID is required'], 400);
        }
    
        // Fetch the parent asset
        $parentAsset = Asset::getById($parentId);
    
        if (!$parentAsset || !$parentAsset instanceof \Pimcore\Model\Asset\Folder) {
            return new JsonResponse(['error' => 'Parent asset not found or not a folder'], 404);
        }
    
        // Recursively get all assets
        $allAssets = $this->getAllAssetsFromFolder($parentAsset);
     
        // Render content for the assets
        $htmlContent = $this->renderView('pages/gallerycollection.html.twig', [
            'assets' => $allAssets,
            'parentFolderName' => $parentFolderName
        ]);
    
        return new JsonResponse(['html' => $htmlContent]);
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