import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import PlayerTable from "./Components/PlayerTable";
import Searchbar from "@/Components/Searchbar";
import Pagination from "@/Components/Pagination";
import { useState, useEffect } from "react";
import Modal from "@/Components/Modal";
import PlayerGenerate from "./Components/PlayerGenerate";

export default function PlayersIndex({ players, filters }) {
    const [isCreateModalOpen, setIsCreateModalOpen] = useState(false);
    const [isGenerateModalOpen, setIsGenerateModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);
    const [isAddModalOpen, setIsAddModalOpen] = useState(false);
    const [selectedPlayer, setSelectedPlayer] = useState(null);

    const [query, setQuery] = useState({
        search: filters.search,
        free: filters.free,
        role: filters.role,
    });

    const toggleFree = () => {
        setQuery((query) => {
            return {
                ...query,
                free: !query.free,
            };
        });
    };

    const toggleRole = (role) => {
        setQuery((query) => {
            return {
                ...query,
                role: role === query.role ? null : role,
            };
        });
    };

    useEffect(() => {
        router.get(
            route("players.index"),
            {
                search: query.search || undefined,
                free: query.free ? 1 : undefined,
                role: query.role || undefined,
            },
            {
                preserveState: true,
                preserveScroll: true,
                replace: true,
            },
        );
    }, [query]);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Players
                </h2>
            }
        >
            <Head title="Players" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center mt-2 mb-6">
                        {/* Filters */}
                        <div className="flex justify-start items-center space-x-6">
                            <Searchbar routeName={"players.index"} />
                            <div
                                onClick={() => toggleFree()}
                                className={`w-6 h-6 rounded-full bg-lightGrey-600 ${filters.free ? "border-2 border-primaryRed-600" : ""}`}
                            />
                            <div className="flex justify-start items-center space-x-2">
                                <div
                                    onClick={() => toggleRole("Goalkeeper")}
                                    className={`w-6 h-6 rounded-full bg-roleColors-Goalkeeper ${filters.role === "Goalkeeper" ? "border-2 border-primaryRed-600" : ""}`}
                                />
                                <div
                                    onClick={() => toggleRole("Defender")}
                                    className={`w-6 h-6 rounded-full bg-roleColors-Defender ${filters.role === "Defender" ? "border-2 border-primaryRed-600" : ""}`}
                                />
                                <div
                                    onClick={() => toggleRole("Midfielder")}
                                    className={`w-6 h-6 rounded-full bg-roleColors-Midfielder ${filters.role === "Midfielder" ? "border-2 border-primaryRed-600" : ""}`}
                                />
                                <div
                                    onClick={() => toggleRole("Forward")}
                                    className={`w-6 h-6 rounded-full bg-roleColors-Forward ${filters.role === "Forward" ? "border-2 border-primaryRed-600" : ""}`}
                                />
                            </div>
                            <img
                                className="w-6 h-6 rounded-full"
                                src="images/flags/null.svg"
                                alt="No flag"
                            />
                        </div>
                        {/* Buttons */}
                        <div className="grid grid-cols-2 gap-4">
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsCreateModalOpen(true)}
                            >
                                Create player
                            </PrimaryButton>
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsGenerateModalOpen(true)}
                            >
                                Generate players
                            </PrimaryButton>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {players.data.length > 0 ? (
                                <PlayerTable
                                    players={players.data}
                                    actions={[
                                        {
                                            icon: "view",
                                            onClick: (player) => {
                                                router.visit(
                                                    route(
                                                        "players.show",
                                                        player.id,
                                                    ),
                                                );
                                            },
                                        },
                                        {
                                            icon: "edit",
                                            onClick: (player) => {
                                                setSelectedPlayer(player);
                                                setIsEditModalOpen(true);
                                            },
                                        },
                                        {
                                            icon: "add",
                                            onClick: (player) => {
                                                setSelectedPlayer(player);
                                                setIsAddModalOpen(true);
                                            },
                                        },
                                        {
                                            icon: "delete",
                                            onClick: (player) => {
                                                setSelectedPlayer(player);
                                                setIsDeleteModalOpen(true);
                                            },
                                        },
                                    ]}
                                />
                            ) : (
                                <div>
                                    <h1 className="mb-4 text-xl font-semibold">
                                        Your world needs its first player
                                    </h1>
                                    <p>
                                        There are no players in your universe
                                        yet. Create one from scratch and shape
                                        its identity, or let the factory
                                        generate players for you to get started
                                        quickly.
                                    </p>
                                </div>
                            )}
                        </div>
                    </div>
                    <Pagination links={players.links} meta={players.meta} />
                </div>
            </div>
            <Modal show={isCreateModalOpen}>
                <div>
                    <h1>Create a Player</h1>
                </div>
            </Modal>
            <Modal
                show={isGenerateModalOpen}
                onClose={() => {
                    setIsGenerateModalOpen(false);
                }}
            >
                <PlayerGenerate
                    onSuccess={() => {
                        setIsGenerateModalOpen(false);
                    }}
                    onCancel={() => {
                        setIsGenerateModalOpen(false);
                    }}
                />
            </Modal>
            <Modal show={isEditModalOpen}>
                <div>
                    <h1>Edit Player</h1>
                </div>
            </Modal>
            <Modal show={isAddModalOpen}>
                <div>
                    <h1>Add Player to Team</h1>
                </div>
            </Modal>
            <Modal show={isDeleteModalOpen}>
                <div>
                    <h1>Delete Player</h1>
                </div>
            </Modal>
        </AuthenticatedLayout>
    );
}
