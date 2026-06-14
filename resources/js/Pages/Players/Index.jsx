import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, router, useForm } from "@inertiajs/react";
import PlayerTable from "./Components/PlayerTable";
import Searchbar from "@/Components/Searchbar";
import Pagination from "@/Components/Pagination";
import { useState } from "react";
import Modal from "@/Components/Modal";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import SecondaryButton from "@/Components/SecondaryButton";

export default function PlayersIndex({ players, filters }) {
    const [isCreateModalOpen, setIsCreateModalOpen] = useState(false);
    const [isGenerateModalOpen, setIsGenerateModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);
    const [isAddModalOpen, setIsAddModalOpen] = useState(false);
    const [selectedPlayer, setSelectedPlayer] = useState(null);

    console.log(filters);

    const form = useForm({
        size: 11,
    });

    const generatePlayers = (e) => {
        e.preventDefault();
        form.post(route("players.generate"), {
            onSuccess: () => {
                setIsGenerateModalOpen(false);
            },
        });
    };

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
                            <Link
                                href={route("players.index", {
                                    ...filters,
                                    free: parseInt(filters.free ?? "0") ? 0 : 1,
                                })}
                            >
                                <div
                                    className={`w-6 h-6 rounded-full bg-lightGrey-600 ${parseInt(filters.free ?? "0") ? "border-2 border-darkGrey-600" : ""}`}
                                />
                            </Link>
                            <div className="flex justify-start items-center space-x-2">
                                <div className="w-6 h-6 rounded-full bg-roleColors-Goalkeeper" />
                                <div className="w-6 h-6 rounded-full bg-roleColors-Defender" />
                                <div className="w-6 h-6 rounded-full bg-roleColors-Midfielder" />
                                <div className="w-6 h-6 rounded-full bg-roleColors-Forward" />
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
                <div className="p-6">
                    <h3 className="text-lg font-medium text-primaryRed-600">
                        Players Factory
                    </h3>
                    <form
                        className="flex flex-col mt-4 space-y-4"
                        onSubmit={generatePlayers}
                    >
                        <InputLabel htmlFor="size">
                            How many players do you want to generate?
                        </InputLabel>
                        <TextInput
                            id="size"
                            value={form.data.size}
                            onChange={(e) =>
                                form.setData("size", e.target.value)
                            }
                            type="number"
                            placeholder="Size"
                        />
                        <div className="flex gap-2 justify-end mt-8">
                            <SecondaryButton
                                type="button"
                                onClick={() => {
                                    form.reset("logo");
                                    onCancel?.();
                                }}
                            >
                                Cancel
                            </SecondaryButton>

                            <PrimaryButton
                                type="submit"
                                disabled={form.processing}
                            >
                                Generate
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
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
